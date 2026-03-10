<?php

namespace App\Livewire\Dashboard\Portfolio\Contacts;

use App\Livewire\Dashboard\Portfolio\BasePortfolioTable;
use App\Models\ContactMessage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ContactData extends BasePortfolioTable
{
    protected function query(): Builder
    {
        return ContactMessage::query()->latest();
    }

    protected function viewName(): string
    {
        return 'dashboard.portfolio.contacts.contact-data';
    }

    protected function resolveRecord(int $id): Model
    {
        return ContactMessage::query()->findOrFail($id);
    }

    protected function deletePermission(): string
    {
        return 'portfolio_contacts_delete';
    }

    protected function searchColumns(): array
    {
        return ['name', 'email', 'phone', 'company', 'service_interest', 'status', 'subject'];
    }

    public function updateStatus(int $id, string $status): void
    {
        $this->authorizeDashboardPermission('portfolio_contacts_update');

        $message = ContactMessage::query()->findOrFail($id);
        $message->update(['status' => $status]);

        $this->notifySuccess(__('dashboard.update-successfully'));
    }
}
