<?php

namespace App\Livewire\Dashboard\Portfolio\Concerns;

trait DispatchesDashboardNotifications
{
    protected function notifySuccess(string $message): void
    {
        $this->dispatch('dashboard-toast', type: 'success', message: $message);
    }

    protected function notifyError(string $message): void
    {
        $this->dispatch('dashboard-toast', type: 'error', message: $message);
    }

    public function confirmDelete(int $id, string $listener = 'deleteItem'): void
    {
        $this->dispatch('dashboard-confirm-delete', id: $id, listener: $listener);
    }
}
