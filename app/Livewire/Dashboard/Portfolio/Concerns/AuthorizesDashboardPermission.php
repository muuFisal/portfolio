<?php

namespace App\Livewire\Dashboard\Portfolio\Concerns;

trait AuthorizesDashboardPermission
{
    protected function authorizeDashboardPermission(string $permission): void
    {
        abort_unless(
            auth('admin')->check() && auth('admin')->user()->can($permission),
            403
        );
    }
}
