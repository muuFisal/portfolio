<div>
    <form class="form form-horizontal" wire:submit.prevent="submit">
        <div class="row">
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.title-ar') }}</label>
                <input type="text" class="form-control" wire:model.defer="title_ar">
                @include('dashboard.includes.error', ['property' => 'title_ar'])
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.title-en') }}</label>
                <input type="text" class="form-control" wire:model.defer="title_en">
                @include('dashboard.includes.error', ['property' => 'title_en'])
            </div>
        </div>
        <div class="row">
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.description-ar') }}</label>
                <textarea class="form-control" rows="4" wire:model.defer="description_ar"></textarea>
                @include('dashboard.includes.error', ['property' => 'description_ar'])
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.description-en') }}</label>
                <textarea class="form-control" rows="4" wire:model.defer="description_en"></textarea>
                @include('dashboard.includes.error', ['property' => 'description_en'])
            </div>
        </div>
        <div class="row">
            <div class="mb-1 col-md-3">
                <label class="form-label">{{ __('dashboard.icon') }}</label>
                <input type="text" class="form-control" wire:model.defer="icon">
                @include('dashboard.includes.error', ['property' => 'icon'])
            </div>
            <div class="mb-1 col-md-3">
                <label class="form-label">{{ __('dashboard.value') }}</label>
                <input type="number" min="0" class="form-control" wire:model.defer="value">
                @include('dashboard.includes.error', ['property' => 'value'])
            </div>
            <div class="mb-1 col-md-3">
                <label class="form-label">{{ __('dashboard.unit') }}</label>
                <input type="text" class="form-control" wire:model.defer="unit">
                @include('dashboard.includes.error', ['property' => 'unit'])
            </div>
            <div class="mb-1 col-md-3">
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
