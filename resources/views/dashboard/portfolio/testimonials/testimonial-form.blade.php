<div>
    <form class="form form-horizontal" wire:submit.prevent="submit">
        <div class="row">
            <div class="mb-1 col-md-6"><label class="form-label">{{ __('dashboard.name') }}</label><input type="text" class="form-control" wire:model.defer="name"></div>
            <div class="mb-1 col-md-6"><label class="form-label">{{ __('dashboard.company') }}</label><input type="text" class="form-control" wire:model.defer="company"></div>
        </div>
        <div class="row">
            <div class="mb-1 col-md-6"><label class="form-label">{{ __('dashboard.role-ar') }}</label><input type="text" class="form-control" wire:model.defer="role_ar"></div>
            <div class="mb-1 col-md-6"><label class="form-label">{{ __('dashboard.role-en') }}</label><input type="text" class="form-control" wire:model.defer="role_en"></div>
        </div>
        <div class="row">
            <div class="mb-1 col-md-6"><label class="form-label">{{ __('dashboard.badge-ar') }}</label><input type="text" class="form-control" wire:model.defer="badge_ar"></div>
            <div class="mb-1 col-md-6"><label class="form-label">{{ __('dashboard.badge-en') }}</label><input type="text" class="form-control" wire:model.defer="badge_en"></div>
        </div>
        <div class="row">
            <div class="mb-1 col-md-6"><label class="form-label">{{ __('dashboard.quote-ar') }}</label><textarea class="form-control" rows="4" wire:model.defer="quote_ar"></textarea></div>
            <div class="mb-1 col-md-6"><label class="form-label">{{ __('dashboard.quote-en') }}</label><textarea class="form-control" rows="4" wire:model.defer="quote_en"></textarea></div>
        </div>
        <div class="row">
            <div class="mb-1 col-md-4">
                <label class="form-label">{{ __('dashboard.image') }}</label>
                @if ($avatar && ! is_object($avatar))
                    <div class="mb-1"><img src="{{ app(\App\Utils\ImageManger::class)->url($avatar) }}" class="img-fluid rounded" style="max-height: 120px;"></div>
                @elseif ($avatar)
                    <div class="mb-1"><img src="{{ $avatar->temporaryUrl() }}" class="img-fluid rounded" style="max-height: 120px;"></div>
                @endif
                <input type="file" class="form-control" wire:model="avatar">
            </div>
            <div class="mb-1 col-md-4">
                <label class="form-label">{{ __('dashboard.featured') }}</label>
                <select class="form-select" wire:model.defer="featured">
                    <option value="1">{{ __('dashboard.yes') }}</option>
                    <option value="0">{{ __('dashboard.no') }}</option>
                </select>
            </div>
            <div class="mb-1 col-md-4">
                <label class="form-label">{{ __('dashboard.sort-order') }}</label>
                <input type="number" min="0" class="form-control" wire:model.defer="sort_order">
            </div>
        </div>
        <button type="submit" class="btn btn-primary waves-effect waves-float waves-light mt-2">{{ __('dashboard.submit') }}</button>
    </form>
</div>
