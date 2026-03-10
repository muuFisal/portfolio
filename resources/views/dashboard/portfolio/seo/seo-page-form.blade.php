<div>
    <form class="form form-horizontal" wire:submit.prevent="submit">
        <div class="row">
            <div class="mb-1 col-md-4">
                <label class="form-label">{{ __('dashboard.page-key') }}</label>
                <input type="text" class="form-control" wire:model.defer="page_key">
                @include('dashboard.includes.error', ['property' => 'page_key'])
            </div>
            <div class="mb-1 col-md-4">
                <label class="form-label">{{ __('dashboard.canonical-url') }}</label>
                <input type="url" class="form-control" wire:model.defer="canonical_url">
                @include('dashboard.includes.error', ['property' => 'canonical_url'])
            </div>
            <div class="mb-1 col-md-4">
                <label class="form-label">{{ __('dashboard.robots') }}</label>
                <select class="form-select" wire:model.defer="robots">
                    @foreach (config('portfolio.seo_robots') as $robotsOption)
                        <option value="{{ $robotsOption }}">{{ $robotsOption }}</option>
                    @endforeach
                </select>
            </div>
        </div>
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
                <label class="form-label">{{ __('dashboard.seo-title-ar') }}</label>
                <input type="text" class="form-control" wire:model.defer="seo_title_ar">
                @include('dashboard.includes.error', ['property' => 'seo_title_ar'])
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.seo-title-en') }}</label>
                <input type="text" class="form-control" wire:model.defer="seo_title_en">
                @include('dashboard.includes.error', ['property' => 'seo_title_en'])
            </div>
        </div>
        <div class="row">
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.seo-description-ar') }}</label>
                <textarea class="form-control" rows="4" wire:model.defer="seo_description_ar"></textarea>
                @include('dashboard.includes.error', ['property' => 'seo_description_ar'])
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.seo-description-en') }}</label>
                <textarea class="form-control" rows="4" wire:model.defer="seo_description_en"></textarea>
                @include('dashboard.includes.error', ['property' => 'seo_description_en'])
            </div>
        </div>
        <div class="row">
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.seo-keywords') }}</label>
                <textarea class="form-control" rows="3" wire:model.defer="seo_keywords_text"></textarea>
                @include('dashboard.includes.error', ['property' => 'seo_keywords_text'])
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.extra-meta') }}</label>
                <textarea class="form-control" rows="3" wire:model.defer="extra_meta_text"></textarea>
                @include('dashboard.includes.error', ['property' => 'extra_meta_text'])
            </div>
        </div>
        <div class="mb-2">
            <label class="form-label">{{ __('dashboard.og-image') }}</label>
            @if ($og_image && ! is_object($og_image))
                <div class="mb-1">
                    <img src="{{ app(\App\Utils\ImageManger::class)->url($og_image) }}" class="img-fluid rounded"
                        style="max-height: 120px;">
                </div>
            @elseif ($og_image)
                <div class="mb-1">
                    <img src="{{ $og_image->temporaryUrl() }}" class="img-fluid rounded" style="max-height: 120px;">
                </div>
            @endif
            <input type="file" class="form-control" wire:model="og_image">
            @include('dashboard.includes.error', ['property' => 'og_image'])
        </div>
        <button type="submit" class="btn btn-primary waves-effect waves-float waves-light mt-2">
            {{ __('dashboard.submit') }}
        </button>
    </form>
</div>
