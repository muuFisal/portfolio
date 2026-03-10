<div>
    <form class="form form-horizontal" wire:submit.prevent="submit">
        <h5 class="mb-2">{{ __('dashboard.basic-info') }}</h5>
        <div class="row">
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.site-name-ar') }}</label>
                <input type="text" class="form-control" wire:model.defer="site_name_ar">
                @include('dashboard.includes.error', ['property' => 'site_name_ar'])
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.site-name-en') }}</label>
                <input type="text" class="form-control" wire:model.defer="site_name_en">
                @include('dashboard.includes.error', ['property' => 'site_name_en'])
            </div>
        </div>
        <div class="row">
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.site-title-ar') }}</label>
                <input type="text" class="form-control" wire:model.defer="site_title_ar">
                @include('dashboard.includes.error', ['property' => 'site_title_ar'])
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.site-title-en') }}</label>
                <input type="text" class="form-control" wire:model.defer="site_title_en">
                @include('dashboard.includes.error', ['property' => 'site_title_en'])
            </div>
        </div>
        <div class="row">
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.site-desc-ar') }}</label>
                <textarea class="form-control" rows="4" wire:model.defer="site_desc_ar"></textarea>
                @include('dashboard.includes.error', ['property' => 'site_desc_ar'])
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.site-desc-en') }}</label>
                <textarea class="form-control" rows="4" wire:model.defer="site_desc_en"></textarea>
                @include('dashboard.includes.error', ['property' => 'site_desc_en'])
            </div>
        </div>
        <div class="row">
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.site-address-ar') }}</label>
                <input type="text" class="form-control" wire:model.defer="site_address_ar">
                @include('dashboard.includes.error', ['property' => 'site_address_ar'])
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.site-address-en') }}</label>
                <input type="text" class="form-control" wire:model.defer="site_address_en">
                @include('dashboard.includes.error', ['property' => 'site_address_en'])
            </div>
        </div>

        <h5 class="mt-3 mb-2">{{ __('dashboard.contacts') }}</h5>
        <div class="row">
            <div class="mb-1 col-md-3">
                <label class="form-label">{{ __('dashboard.site-phone') }}</label>
                <input type="text" class="form-control" wire:model.defer="site_phone">
                @include('dashboard.includes.error', ['property' => 'site_phone'])
            </div>
            <div class="mb-1 col-md-3">
                <label class="form-label">{{ __('dashboard.whatsapp') }}</label>
                <input type="text" class="form-control" wire:model.defer="whatsapp">
                @include('dashboard.includes.error', ['property' => 'whatsapp'])
            </div>
            <div class="mb-1 col-md-3">
                <label class="form-label">{{ __('dashboard.site-email') }}</label>
                <input type="email" class="form-control" wire:model.defer="site_email">
                @include('dashboard.includes.error', ['property' => 'site_email'])
            </div>
            <div class="mb-1 col-md-3">
                <label class="form-label">{{ __('dashboard.email-support') }}</label>
                <input type="email" class="form-control" wire:model.defer="email_support">
                @include('dashboard.includes.error', ['property' => 'email_support'])
            </div>
        </div>

        <h5 class="mt-3 mb-2">{{ __('dashboard.social-media') }}</h5>
        <div class="row">
            <div class="mb-1 col-md-4">
                <label class="form-label">{{ __('dashboard.facebook-url') }}</label>
                <input type="url" class="form-control" wire:model.defer="facebook">
                @include('dashboard.includes.error', ['property' => 'facebook'])
            </div>
            <div class="mb-1 col-md-4">
                <label class="form-label">{{ __('dashboard.x-url') }}</label>
                <input type="url" class="form-control" wire:model.defer="x_url">
                @include('dashboard.includes.error', ['property' => 'x_url'])
            </div>
            <div class="mb-1 col-md-4">
                <label class="form-label">{{ __('dashboard.github') }}</label>
                <input type="url" class="form-control" wire:model.defer="github">
                @include('dashboard.includes.error', ['property' => 'github'])
            </div>
        </div>
        <div class="row">
            <div class="mb-1 col-md-4">
                <label class="form-label">{{ __('dashboard.youtube-url') }}</label>
                <input type="url" class="form-control" wire:model.defer="youtube">
                @include('dashboard.includes.error', ['property' => 'youtube'])
            </div>
            <div class="mb-1 col-md-4">
                <label class="form-label">{{ __('dashboard.instagram-url') }}</label>
                <input type="url" class="form-control" wire:model.defer="instagram">
                @include('dashboard.includes.error', ['property' => 'instagram'])
            </div>
            <div class="mb-1 col-md-4">
                <label class="form-label">{{ __('dashboard.tiktok-url') }}</label>
                <input type="url" class="form-control" wire:model.defer="tiktok">
                @include('dashboard.includes.error', ['property' => 'tiktok'])
            </div>
        </div>
        <div class="row">
            <div class="mb-1 col-md-4">
                <label class="form-label">{{ __('dashboard.linkedin-url') }}</label>
                <input type="url" class="form-control" wire:model.defer="linkedin">
                @include('dashboard.includes.error', ['property' => 'linkedin'])
            </div>
        </div>

        <h5 class="mt-3 mb-2">{{ __('dashboard.media') }}</h5>
        <div class="row">
            @foreach (['logo', 'logo_dark', 'favicon', 'profile_image', 'default_og_image'] as $field)
                <div class="mb-2 col-md-4">
                    <label class="form-label">{{ __('dashboard.' . str_replace('_', '-', $field)) }}</label>
                    <div class="mb-1">
                        @if ($this->{$field} && is_object($this->{$field}))
                            <img src="{{ $this->{$field}->temporaryUrl() }}" class="img-fluid rounded" style="max-height: 120px;">
                        @elseif ($this->{$field})
                            <img src="{{ app(\App\Utils\ImageManger::class)->url($this->{$field}) }}" class="img-fluid rounded" style="max-height: 120px;">
                        @endif
                    </div>
                    <input type="file" class="form-control" wire:model="{{ $field }}">
                    @include('dashboard.includes.error', ['property' => $field])
                </div>
            @endforeach
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
        </div>

        <h5 class="mt-3 mb-2">{{ __('dashboard.seo') }}</h5>
        <div class="row">
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.meta-key-ar') }}</label>
                <textarea class="form-control" rows="3" wire:model.defer="meta_key_ar"></textarea>
                @include('dashboard.includes.error', ['property' => 'meta_key_ar'])
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.meta-key-en') }}</label>
                <textarea class="form-control" rows="3" wire:model.defer="meta_key_en"></textarea>
                @include('dashboard.includes.error', ['property' => 'meta_key_en'])
            </div>
        </div>
        <div class="row">
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.meta-desc-ar') }}</label>
                <textarea class="form-control" rows="4" wire:model.defer="meta_desc_ar"></textarea>
                @include('dashboard.includes.error', ['property' => 'meta_desc_ar'])
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.meta-desc-en') }}</label>
                <textarea class="form-control" rows="4" wire:model.defer="meta_desc_en"></textarea>
                @include('dashboard.includes.error', ['property' => 'meta_desc_en'])
            </div>
        </div>

        <div class="row mt-3">
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.site-copyright') }}</label>
                <input type="text" class="form-control" wire:model.defer="site_copyright">
                @include('dashboard.includes.error', ['property' => 'site_copyright'])
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.site-promo') }}</label>
                <input type="url" class="form-control" wire:model.defer="promotion_url">
                @include('dashboard.includes.error', ['property' => 'promotion_url'])
            </div>
        </div>

        <button type="submit" class="btn btn-primary waves-effect waves-float waves-light mt-2">
            {{ __('dashboard.submit') }}
        </button>
    </form>
</div>
