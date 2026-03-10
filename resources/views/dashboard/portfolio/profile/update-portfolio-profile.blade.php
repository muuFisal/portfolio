<div>
    <form class="form form-horizontal" wire:submit.prevent="submit">
        <div class="row">
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.full-name') }}</label>
                <input type="text" class="form-control" wire:model.defer="full_name">
                @include('dashboard.includes.error', ['property' => 'full_name'])
            </div>
            <div class="mb-1 col-md-3">
                <label class="form-label">{{ __('dashboard.email') }}</label>
                <input type="email" class="form-control" wire:model.defer="email">
                @include('dashboard.includes.error', ['property' => 'email'])
            </div>
            <div class="mb-1 col-md-3">
                <label class="form-label">{{ __('dashboard.phone') }}</label>
                <input type="text" class="form-control" wire:model.defer="phone">
                @include('dashboard.includes.error', ['property' => 'phone'])
            </div>
        </div>
        <div class="row">
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.headline-ar') }}</label>
                <input type="text" class="form-control" wire:model.defer="headline_ar">
                @include('dashboard.includes.error', ['property' => 'headline_ar'])
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.headline-en') }}</label>
                <input type="text" class="form-control" wire:model.defer="headline_en">
                @include('dashboard.includes.error', ['property' => 'headline_en'])
            </div>
        </div>
        <div class="row">
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.short-bio-ar') }}</label>
                <textarea class="form-control" rows="4" wire:model.defer="short_bio_ar"></textarea>
                @include('dashboard.includes.error', ['property' => 'short_bio_ar'])
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.short-bio-en') }}</label>
                <textarea class="form-control" rows="4" wire:model.defer="short_bio_en"></textarea>
                @include('dashboard.includes.error', ['property' => 'short_bio_en'])
            </div>
        </div>
        <div class="row">
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.long-bio-ar') }}</label>
                <textarea class="form-control" rows="5" wire:model.defer="long_bio_ar"></textarea>
                @include('dashboard.includes.error', ['property' => 'long_bio_ar'])
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.long-bio-en') }}</label>
                <textarea class="form-control" rows="5" wire:model.defer="long_bio_en"></textarea>
                @include('dashboard.includes.error', ['property' => 'long_bio_en'])
            </div>
        </div>
        <div class="row">
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.location-ar') }}</label>
                <input type="text" class="form-control" wire:model.defer="location_ar">
                @include('dashboard.includes.error', ['property' => 'location_ar'])
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.location-en') }}</label>
                <input type="text" class="form-control" wire:model.defer="location_en">
                @include('dashboard.includes.error', ['property' => 'location_en'])
            </div>
        </div>
        <div class="row">
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.availability-text-ar') }}</label>
                <textarea class="form-control" rows="3" wire:model.defer="availability_text_ar"></textarea>
                @include('dashboard.includes.error', ['property' => 'availability_text_ar'])
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.availability-text-en') }}</label>
                <textarea class="form-control" rows="3" wire:model.defer="availability_text_en"></textarea>
                @include('dashboard.includes.error', ['property' => 'availability_text_en'])
            </div>
        </div>
        <div class="row">
            <div class="mb-1 col-md-4">
                <label class="form-label">{{ __('dashboard.years-experience') }}</label>
                <input type="number" min="0" class="form-control" wire:model.defer="years_experience">
                @include('dashboard.includes.error', ['property' => 'years_experience'])
            </div>
            <div class="mb-1 col-md-4">
                <label class="form-label">{{ __('dashboard.projects-delivered') }}</label>
                <input type="number" min="0" class="form-control" wire:model.defer="projects_delivered">
                @include('dashboard.includes.error', ['property' => 'projects_delivered'])
            </div>
            <div class="mb-1 col-md-4">
                <label class="form-label">{{ __('dashboard.clients-count') }}</label>
                <input type="number" min="0" class="form-control" wire:model.defer="clients_count">
                @include('dashboard.includes.error', ['property' => 'clients_count'])
            </div>
        </div>
        <div class="row">
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.focus-areas-ar') }}</label>
                <textarea class="form-control" rows="4" wire:model.defer="focus_areas_ar"></textarea>
                @include('dashboard.includes.error', ['property' => 'focus_areas_ar'])
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.focus-areas-en') }}</label>
                <textarea class="form-control" rows="4" wire:model.defer="focus_areas_en"></textarea>
                @include('dashboard.includes.error', ['property' => 'focus_areas_en'])
            </div>
        </div>
        <div class="row">
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.hero-badges-ar') }}</label>
                <textarea class="form-control" rows="4" wire:model.defer="hero_badges_ar"></textarea>
                @include('dashboard.includes.error', ['property' => 'hero_badges_ar'])
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.hero-badges-en') }}</label>
                <textarea class="form-control" rows="4" wire:model.defer="hero_badges_en"></textarea>
                @include('dashboard.includes.error', ['property' => 'hero_badges_en'])
            </div>
        </div>
        <div class="row">
            <div class="mb-1 col-md-3">
                <label class="form-label">{{ __('dashboard.primary-cta-label-ar') }}</label>
                <input type="text" class="form-control" wire:model.defer="primary_cta_label_ar">
                @include('dashboard.includes.error', ['property' => 'primary_cta_label_ar'])
            </div>
            <div class="mb-1 col-md-3">
                <label class="form-label">{{ __('dashboard.primary-cta-label-en') }}</label>
                <input type="text" class="form-control" wire:model.defer="primary_cta_label_en">
                @include('dashboard.includes.error', ['property' => 'primary_cta_label_en'])
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.primary-cta-url') }}</label>
                <input type="text" class="form-control" wire:model.defer="primary_cta_url">
                @include('dashboard.includes.error', ['property' => 'primary_cta_url'])
            </div>
        </div>
        <div class="row">
            <div class="mb-1 col-md-3">
                <label class="form-label">{{ __('dashboard.secondary-cta-label-ar') }}</label>
                <input type="text" class="form-control" wire:model.defer="secondary_cta_label_ar">
                @include('dashboard.includes.error', ['property' => 'secondary_cta_label_ar'])
            </div>
            <div class="mb-1 col-md-3">
                <label class="form-label">{{ __('dashboard.secondary-cta-label-en') }}</label>
                <input type="text" class="form-control" wire:model.defer="secondary_cta_label_en">
                @include('dashboard.includes.error', ['property' => 'secondary_cta_label_en'])
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.secondary-cta-url') }}</label>
                <input type="text" class="form-control" wire:model.defer="secondary_cta_url">
                @include('dashboard.includes.error', ['property' => 'secondary_cta_url'])
            </div>
        </div>
        <div class="row">
            <div class="mb-2 col-md-4">
                <label class="form-label">{{ __('dashboard.profile-image') }}</label>
                @if ($profile_image && ! is_object($profile_image))
                    <div class="mb-1">
                        <img src="{{ app(\App\Utils\ImageManger::class)->url($profile_image) }}" class="img-fluid rounded"
                            style="max-height: 120px;">
                    </div>
                @elseif ($profile_image)
                    <div class="mb-1">
                        <img src="{{ $profile_image->temporaryUrl() }}" class="img-fluid rounded" style="max-height: 120px;">
                    </div>
                @endif
                <input type="file" class="form-control" wire:model="profile_image">
                @include('dashboard.includes.error', ['property' => 'profile_image'])
            </div>
            <div class="mb-2 col-md-4">
                <label class="form-label">{{ __('dashboard.resume') }}</label>
                @if ($resume && ! is_object($resume))
                    <div class="mb-1">
                        <a href="{{ app(\App\Utils\ImageManger::class)->url($resume) }}" target="_blank">{{ __('dashboard.view') }}</a>
                    </div>
                @endif
                <input type="file" class="form-control" wire:model="resume">
                @include('dashboard.includes.error', ['property' => 'resume'])
            </div>
            <div class="mb-2 col-md-4">
                <label class="form-label">{{ __('dashboard.status') }}</label>
                <select class="form-select" wire:model.defer="is_active">
                    <option value="1">{{ __('dashboard.active') }}</option>
                    <option value="0">{{ __('dashboard.inactive') }}</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary waves-effect waves-float waves-light mt-2">
            {{ __('dashboard.submit') }}
        </button>
    </form>
</div>
