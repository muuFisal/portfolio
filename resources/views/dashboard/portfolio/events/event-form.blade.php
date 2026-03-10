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
            <div class="mb-1 col-md-4">
                <label class="form-label">{{ __('dashboard.type') }}</label>
                <input type="text" class="form-control" wire:model.defer="type">
            </div>
            <div class="mb-1 col-md-4">
                <label class="form-label">{{ __('dashboard.date') }}</label>
                <input type="date" class="form-control" wire:model.defer="date">
            </div>
            <div class="mb-1 col-md-4">
                <label class="form-label">{{ __('dashboard.featured') }}</label>
                <select class="form-select" wire:model.defer="featured">
                    <option value="1">{{ __('dashboard.yes') }}</option>
                    <option value="0">{{ __('dashboard.no') }}</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.location-ar') }}</label>
                <input type="text" class="form-control" wire:model.defer="location_ar">
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.location-en') }}</label>
                <input type="text" class="form-control" wire:model.defer="location_en">
            </div>
        </div>
        <div class="row">
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.description-ar') }}</label>
                <textarea class="form-control" rows="4" wire:model.defer="description_ar"></textarea>
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.description-en') }}</label>
                <textarea class="form-control" rows="4" wire:model.defer="description_en"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.url') }}</label>
                <input type="url" class="form-control" wire:model.defer="url">
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.sort-order') }}</label>
                <input type="number" min="0" class="form-control" wire:model.defer="sort_order">
            </div>
        </div>
        <div class="mb-2">
            <label class="form-label">{{ __('dashboard.image') }}</label>
            @if ($cover_image && ! is_object($cover_image))
                <div class="mb-1">
                    <img src="{{ app(\App\Utils\ImageManger::class)->url($cover_image) }}" class="img-fluid rounded" style="max-height: 120px;">
                </div>
            @elseif ($cover_image)
                <div class="mb-1">
                    <img src="{{ $cover_image->temporaryUrl() }}" class="img-fluid rounded" style="max-height: 120px;">
                </div>
            @endif
            <input type="file" class="form-control" wire:model="cover_image">
        </div>
        <button type="submit" class="btn btn-primary waves-effect waves-float waves-light mt-2">
            {{ __('dashboard.submit') }}
        </button>
    </form>
</div>
