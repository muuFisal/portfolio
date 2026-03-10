<div>
    <form class="form form-horizontal" wire:submit.prevent="submit">
        <div class="row">
            <div class="mb-1 col-md-6"><label class="form-label">{{ __('dashboard.title-ar') }}</label><input type="text" class="form-control" wire:model.defer="role_ar"></div>
            <div class="mb-1 col-md-6"><label class="form-label">{{ __('dashboard.title-en') }}</label><input type="text" class="form-control" wire:model.defer="role_en"></div>
        </div>
        <div class="row">
            <div class="mb-1 col-md-6"><label class="form-label">{{ __('dashboard.company') }}</label><input type="text" class="form-control" wire:model.defer="company"></div>
            <div class="mb-1 col-md-6"><label class="form-label">{{ __('dashboard.url') }}</label><input type="url" class="form-control" wire:model.defer="company_url"></div>
        </div>
        <div class="row">
            <div class="mb-1 col-md-6"><label class="form-label">{{ __('dashboard.description-ar') }}</label><textarea class="form-control" rows="4" wire:model.defer="summary_ar"></textarea></div>
            <div class="mb-1 col-md-6"><label class="form-label">{{ __('dashboard.description-en') }}</label><textarea class="form-control" rows="4" wire:model.defer="summary_en"></textarea></div>
        </div>
        <div class="row">
            <div class="mb-1 col-md-6"><label class="form-label">{{ __('dashboard.location-ar') }}</label><input type="text" class="form-control" wire:model.defer="location_ar"></div>
            <div class="mb-1 col-md-6"><label class="form-label">{{ __('dashboard.location-en') }}</label><input type="text" class="form-control" wire:model.defer="location_en"></div>
        </div>
        <div class="row">
            <div class="mb-1 col-md-6"><label class="form-label">{{ __('dashboard.employment-type-ar') }}</label><input type="text" class="form-control" wire:model.defer="employment_type_ar"></div>
            <div class="mb-1 col-md-6"><label class="form-label">{{ __('dashboard.employment-type-en') }}</label><input type="text" class="form-control" wire:model.defer="employment_type_en"></div>
        </div>
        <div class="row">
            <div class="mb-1 col-md-3"><label class="form-label">{{ __('dashboard.start-date') }}</label><input type="date" class="form-control" wire:model.defer="start_date"></div>
            <div class="mb-1 col-md-3"><label class="form-label">{{ __('dashboard.end-date') }}</label><input type="date" class="form-control" wire:model.defer="end_date"></div>
            <div class="mb-1 col-md-3"><label class="form-label">{{ __('dashboard.sort-order') }}</label><input type="number" min="0" class="form-control" wire:model.defer="sort_order"></div>
            <div class="mb-1 col-md-3">
                <label class="form-label">{{ __('dashboard.logo') }}</label>
                @if ($logo && ! is_object($logo))
                    <div class="mb-1"><img src="{{ app(\App\Utils\ImageManger::class)->url($logo) }}" class="img-fluid rounded" style="max-height: 120px;"></div>
                @elseif ($logo)
                    <div class="mb-1"><img src="{{ $logo->temporaryUrl() }}" class="img-fluid rounded" style="max-height: 120px;"></div>
                @endif
                <input type="file" class="form-control" wire:model="logo">
            </div>
        </div>
        <div class="row">
            <div class="mb-1 col-md-6"><label class="form-label">{{ __('dashboard.highlights-ar') }}</label><textarea class="form-control" rows="4" wire:model.defer="highlights_ar"></textarea></div>
            <div class="mb-1 col-md-6"><label class="form-label">{{ __('dashboard.highlights-en') }}</label><textarea class="form-control" rows="4" wire:model.defer="highlights_en"></textarea></div>
        </div>
        <button type="submit" class="btn btn-primary waves-effect waves-float waves-light mt-2">{{ __('dashboard.submit') }}</button>
    </form>
</div>
