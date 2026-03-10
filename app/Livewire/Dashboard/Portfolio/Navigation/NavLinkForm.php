<?php

namespace App\Livewire\Dashboard\Portfolio\Navigation;

use App\Livewire\Dashboard\Portfolio\BasePortfolioForm;
use App\Models\PortfolioNavLink;

class NavLinkForm extends BasePortfolioForm
{
    public PortfolioNavLink $link;

    public $label_ar;
    public $label_en;
    public $href;
    public $page_key;
    public $target = '_self';
    public $icon;
    public $is_active = true;
    public $sort_order = 0;

    public function mount(?PortfolioNavLink $link = null): void
    {
        $this->link = $link ?? new PortfolioNavLink();
        $this->label_ar = $this->translationValue($this->link->label, 'ar');
        $this->label_en = $this->translationValue($this->link->label, 'en');
        $this->href = $this->link->href;
        $this->page_key = $this->link->page_key;
        $this->target = $this->link->target ?: '_self';
        $this->icon = $this->link->icon;
        $this->is_active = (bool) ($this->link->is_active ?? true);
        $this->sort_order = $this->link->sort_order ?? 0;
    }

    public function rules(): array
    {
        return [
            'label_ar' => ['required', 'string', 'max:255'],
            'label_en' => ['required', 'string', 'max:255'],
            'href' => ['required', 'string', 'max:255'],
            'page_key' => ['nullable', 'string', 'max:100'],
            'target' => ['required', 'string', 'max:20'],
            'icon' => ['nullable', 'string', 'max:100'],
            'is_active' => ['boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ];
    }

    public function submit(): void
    {
        $this->authorizeDashboardPermission($this->link->exists ? 'portfolio_navigation_update' : 'portfolio_navigation_create');

        $data = $this->validate();

        $this->link->fill([
            'label' => $this->toTranslation($data['label_ar'], $data['label_en']),
            'href' => $data['href'],
            'page_key' => $data['page_key'] ?? null,
            'target' => $data['target'],
            'icon' => $data['icon'] ?? null,
            'is_active' => (bool) $data['is_active'],
            'sort_order' => (int) ($data['sort_order'] ?? 0),
        ]);

        $this->link->save();
        $this->notifySuccess($this->link->wasRecentlyCreated ? __('dashboard.add-successfully') : __('dashboard.update-successfully'));
    }

    public function render()
    {
        return view('dashboard.portfolio.navigation.nav-link-form');
    }
}
