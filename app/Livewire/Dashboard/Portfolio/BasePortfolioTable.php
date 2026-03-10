<?php

namespace App\Livewire\Dashboard\Portfolio;

use App\Livewire\Dashboard\Portfolio\Concerns\AuthorizesDashboardPermission;
use App\Livewire\Dashboard\Portfolio\Concerns\DispatchesDashboardNotifications;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;
use Livewire\WithPagination;

abstract class BasePortfolioTable extends Component
{
    use AuthorizesDashboardPermission;
    use DispatchesDashboardNotifications;
    use WithPagination;

    protected $listeners = ['refreshData' => '$refresh', 'deleteItem' => 'deleteItem'];

    public string $search = '';

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    abstract protected function query(): Builder;

    abstract protected function viewName(): string;

    abstract protected function resolveRecord(int $id): Model;

    abstract protected function deletePermission(): string;

    protected function searchColumns(): array
    {
        return [];
    }

    protected function perPage(): int
    {
        return 10;
    }

    public function deleteItem(int $id): void
    {
        $this->authorizeDashboardPermission($this->deletePermission());

        $record = $this->resolveRecord($id);
        $this->deleteRecord($record);

        $this->notifySuccess(__('dashboard.item_deleted_successfully'));
        $this->dispatch('refreshData');
    }

    protected function deleteRecord(Model $record): void
    {
        $record->delete();
    }

    protected function applySearch(Builder $query): Builder
    {
        if (blank($this->search) || $this->searchColumns() === []) {
            return $query;
        }

        $search = '%' . trim($this->search) . '%';

        return $query->where(function (Builder $builder) use ($search) {
            foreach ($this->searchColumns() as $column) {
                $builder->orWhere($column, 'like', $search);
            }
        });
    }

    public function render()
    {
        $data = $this->applySearch($this->query())->paginate($this->perPage());

        return view($this->viewName(), compact('data'));
    }
}
