<div>
    <form class="form form-horizontal" wire:submit.prevent="submit">
        <div class="row">
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.title-ar') }}</label>
                <input type="text" class="form-control" wire:model.defer="title_ar">
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.title-en') }}</label>
                <input type="text" class="form-control" wire:model.defer="title_en">
            </div>
        </div>
        <div class="row">
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.subtitle-ar') }}</label>
                <input type="text" class="form-control" wire:model.defer="subtitle_ar">
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.subtitle-en') }}</label>
                <input type="text" class="form-control" wire:model.defer="subtitle_en">
            </div>
        </div>
        <div class="row">
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.category-ar') }}</label>
                <input type="text" class="form-control" wire:model.defer="category_ar">
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.category-en') }}</label>
                <input type="text" class="form-control" wire:model.defer="category_en">
            </div>
        </div>
        <div class="row">
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.level-label-ar') }}</label>
                <input type="text" class="form-control" wire:model.defer="level_label_ar">
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.level-label-en') }}</label>
                <input type="text" class="form-control" wire:model.defer="level_label_en">
            </div>
        </div>
        <div class="row">
            <div class="mb-1 col-md-3">
                <label class="form-label">{{ __('dashboard.icon') }}</label>
                <input type="text" class="form-control" wire:model.defer="icon">
            </div>
            <div class="mb-1 col-md-3">
                <label class="form-label">{{ __('dashboard.percent') }}</label>
                <input type="number" min="0" max="100" class="form-control" wire:model.defer="percent">
            </div>
            <div class="mb-1 col-md-3">
                <label class="form-label">{{ __('dashboard.featured') }}</label>
                <select class="form-select" wire:model.defer="featured">
                    <option value="1">{{ __('dashboard.yes') }}</option>
                    <option value="0">{{ __('dashboard.no') }}</option>
                </select>
            </div>
            <div class="mb-1 col-md-3">
                <label class="form-label">{{ __('dashboard.sort-order') }}</label>
                <input type="number" min="0" class="form-control" wire:model.defer="sort_order">
            </div>
        </div>
        <button type="submit" class="btn btn-primary waves-effect waves-float waves-light mt-2">
            {{ __('dashboard.submit') }}
        </button>
    </form>
</div>
