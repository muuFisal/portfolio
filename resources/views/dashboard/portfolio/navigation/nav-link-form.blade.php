<div>
    <form class="form form-horizontal" wire:submit.prevent="submit">
        <div class="row">
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.label-ar') }}</label>
                <input type="text" class="form-control" wire:model.defer="label_ar">
                @include('dashboard.includes.error', ['property' => 'label_ar'])
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.label-en') }}</label>
                <input type="text" class="form-control" wire:model.defer="label_en">
                @include('dashboard.includes.error', ['property' => 'label_en'])
            </div>
        </div>
        <div class="row">
            <div class="mb-1 col-md-4">
                <label class="form-label">{{ __('dashboard.url') }}</label>
                <input type="text" class="form-control" wire:model.defer="href">
                @include('dashboard.includes.error', ['property' => 'href'])
            </div>
            <div class="mb-1 col-md-4">
                <label class="form-label">{{ __('dashboard.page-key') }}</label>
                <input type="text" class="form-control" wire:model.defer="page_key">
                @include('dashboard.includes.error', ['property' => 'page_key'])
            </div>
            <div class="mb-1 col-md-4">
                <label class="form-label">{{ __('dashboard.icon') }}</label>
                <input type="text" class="form-control" wire:model.defer="icon">
                @include('dashboard.includes.error', ['property' => 'icon'])
            </div>
        </div>
        <div class="row">
            <div class="mb-1 col-md-4">
                <label class="form-label">{{ __('dashboard.target') }}</label>
                <select class="form-select" wire:model.defer="target">
                    <option value="_self">_self</option>
                    <option value="_blank">_blank</option>
                </select>
                @include('dashboard.includes.error', ['property' => 'target'])
            </div>
            <div class="mb-1 col-md-4">
                <label class="form-label">{{ __('dashboard.status') }}</label>
                <select class="form-select" wire:model.defer="is_active">
                    <option value="1">{{ __('dashboard.active') }}</option>
                    <option value="0">{{ __('dashboard.inactive') }}</option>
                </select>
            </div>
            <div class="mb-1 col-md-4">
                <label class="form-label">{{ __('dashboard.sort-order') }}</label>
                <input type="number" min="0" class="form-control" wire:model.defer="sort_order">
                @include('dashboard.includes.error', ['property' => 'sort_order'])
            </div>
        </div>
        <button type="submit" class="btn btn-primary waves-effect waves-float waves-light mt-2">
            {{ __('dashboard.submit') }}
        </button>
    </form>
</div>
