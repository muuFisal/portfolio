<?php

namespace App\Livewire\Dashboard\Portfolio\Navigation;

use App\Livewire\Dashboard\Portfolio\BasePortfolioTable;
use App\Models\PortfolioNavLink;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class NavLinkData extends BasePortfolioTable
{
    protected function query(): Builder
    {
        return PortfolioNavLink::query()->orderBy('sort_order')->orderBy('id');
    }

    protected function viewName(): string
    {
        return 'dashboard.portfolio.navigation.nav-link-data';
    }

    protected function resolveRecord(int $id): Model
    {
        return PortfolioNavLink::query()->findOrFail($id);
    }

    protected function deletePermission(): string
    {
        return 'portfolio_navigation_delete';
    }

    protected function searchColumns(): array
    {
        return ['label->ar', 'label->en', 'href', 'page_key', 'icon'];
    }

    public function toggleActive(int $id): void
    {
        $this->authorizeDashboardPermission('portfolio_navigation_update');

        $item = PortfolioNavLink::query()->findOrFail($id);
        $item->update(['is_active' => ! $item->is_active]);

        $this->notifySuccess(__('dashboard.status-change'));
    }
}
