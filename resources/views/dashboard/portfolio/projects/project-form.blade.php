<div>
    <form class="form form-horizontal" wire:submit.prevent="submit">
        <div class="row">
            <div class="mb-1 col-md-4"><label class="form-label">{{ __('dashboard.slug') }}</label><input type="text" class="form-control" wire:model.defer="slug"></div>
            <div class="mb-1 col-md-4"><label class="form-label">{{ __('dashboard.category') }}</label><input type="text" class="form-control" wire:model.defer="category"></div>
            <div class="mb-1 col-md-4"><label class="form-label">{{ __('dashboard.project-date') }}</label><input type="date" class="form-control" wire:model.defer="project_date"></div>
        </div>
        <div class="row">
            <div class="mb-1 col-md-6"><label class="form-label">{{ __('dashboard.title-ar') }}</label><input type="text" class="form-control" wire:model.defer="title_ar"></div>
            <div class="mb-1 col-md-6"><label class="form-label">{{ __('dashboard.title-en') }}</label><input type="text" class="form-control" wire:model.defer="title_en"></div>
        </div>
        <div class="row">
            <div class="mb-1 col-md-6"><label class="form-label">{{ __('dashboard.summary-ar') }}</label><textarea class="form-control" rows="3" wire:model.defer="summary_ar"></textarea></div>
            <div class="mb-1 col-md-6"><label class="form-label">{{ __('dashboard.summary-en') }}</label><textarea class="form-control" rows="3" wire:model.defer="summary_en"></textarea></div>
        </div>
        <div class="row">
            <div class="mb-1 col-md-6"><label class="form-label">{{ __('dashboard.description-ar') }}</label><textarea class="form-control" rows="5" wire:model.defer="description_ar"></textarea></div>
            <div class="mb-1 col-md-6"><label class="form-label">{{ __('dashboard.description-en') }}</label><textarea class="form-control" rows="5" wire:model.defer="description_en"></textarea></div>
        </div>
        <div class="row">
            <div class="mb-1 col-md-6"><label class="form-label">{{ __('dashboard.tags') }}</label><input type="text" class="form-control" wire:model.defer="tags_text"></div>
            <div class="mb-1 col-md-6"><label class="form-label">{{ __('dashboard.stack') }}</label><input type="text" class="form-control" wire:model.defer="stack_text"></div>
        </div>
        <div class="row">
            <div class="mb-1 col-md-4"><label class="form-label">{{ __('dashboard.featured') }}</label><select class="form-select" wire:model.defer="featured"><option value="1">{{ __('dashboard.yes') }}</option><option value="0">{{ __('dashboard.no') }}</option></select></div>
            <div class="mb-1 col-md-4"><label class="form-label">{{ __('dashboard.open-source') }}</label><select class="form-select" wire:model.defer="is_open_source"><option value="1">{{ __('dashboard.yes') }}</option><option value="0">{{ __('dashboard.no') }}</option></select></div>
            <div class="mb-1 col-md-4"><label class="form-label">{{ __('dashboard.sort-order') }}</label><input type="number" min="0" class="form-control" wire:model.defer="sort_order"></div>
        </div>
        <div class="row">
            <div class="mb-1 col-md-6"><label class="form-label">{{ __('dashboard.highlights-ar') }}</label><textarea class="form-control" rows="4" wire:model.defer="highlights_ar"></textarea></div>
            <div class="mb-1 col-md-6"><label class="form-label">{{ __('dashboard.highlights-en') }}</label><textarea class="form-control" rows="4" wire:model.defer="highlights_en"></textarea></div>
        </div>
        <div class="row">
            <div class="mb-1 col-md-6"><label class="form-label">{{ __('dashboard.challenges-ar') }}</label><textarea class="form-control" rows="4" wire:model.defer="challenges_ar"></textarea></div>
            <div class="mb-1 col-md-6"><label class="form-label">{{ __('dashboard.challenges-en') }}</label><textarea class="form-control" rows="4" wire:model.defer="challenges_en"></textarea></div>
        </div>
        <div class="row">
            <div class="mb-1 col-md-6"><label class="form-label">{{ __('dashboard.solutions-ar') }}</label><textarea class="form-control" rows="4" wire:model.defer="solutions_ar"></textarea></div>
            <div class="mb-1 col-md-6"><label class="form-label">{{ __('dashboard.solutions-en') }}</label><textarea class="form-control" rows="4" wire:model.defer="solutions_en"></textarea></div>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-3 mb-1">
            <h5 class="mb-0">{{ __('dashboard.metrics') }}</h5>
            <button type="button" class="btn btn-outline-primary btn-sm" wire:click="addMetricRow">{{ __('dashboard.add-item') }}</button>
        </div>
        @foreach ($metricsRows as $index => $row)
            <div class="border rounded p-2 mb-2">
                <div class="row">
                    <div class="mb-1 col-md-4"><label class="form-label">{{ __('dashboard.label-ar') }}</label><input type="text" class="form-control" wire:model.defer="metricsRows.{{ $index }}.label_ar"></div>
                    <div class="mb-1 col-md-4"><label class="form-label">{{ __('dashboard.label-en') }}</label><input type="text" class="form-control" wire:model.defer="metricsRows.{{ $index }}.label_en"></div>
                    <div class="mb-1 col-md-3"><label class="form-label">{{ __('dashboard.value') }}</label><input type="text" class="form-control" wire:model.defer="metricsRows.{{ $index }}.value"></div>
                    <div class="mb-1 col-md-1 d-flex align-items-end"><button type="button" class="btn btn-outline-danger btn-sm" wire:click="removeMetricRow({{ $index }})">{{ __('dashboard.delete') }}</button></div>
                </div>
            </div>
        @endforeach

        <div class="row">
            <div class="mb-2 col-md-6">
                <label class="form-label">{{ __('dashboard.cover-image') }}</label>
                @if ($cover_image && ! is_object($cover_image))
                    <div class="mb-1"><img src="{{ app(\App\Utils\ImageManger::class)->url($cover_image) }}" class="img-fluid rounded" style="max-height: 120px;"></div>
                @elseif ($cover_image)
                    <div class="mb-1"><img src="{{ $cover_image->temporaryUrl() }}" class="img-fluid rounded" style="max-height: 120px;"></div>
                @endif
                <input type="file" class="form-control" wire:model="cover_image">
            </div>
            <div class="mb-2 col-md-6">
                <label class="form-label">{{ __('dashboard.og-image') }}</label>
                @if ($og_image && ! is_object($og_image))
                    <div class="mb-1"><img src="{{ app(\App\Utils\ImageManger::class)->url($og_image) }}" class="img-fluid rounded" style="max-height: 120px;"></div>
                @elseif ($og_image)
                    <div class="mb-1"><img src="{{ $og_image->temporaryUrl() }}" class="img-fluid rounded" style="max-height: 120px;"></div>
                @endif
                <input type="file" class="form-control" wire:model="og_image">
            </div>
        </div>

        <div class="row">
            <div class="mb-1 col-md-4"><label class="form-label">{{ __('dashboard.web-url') }}</label><input type="url" class="form-control" wire:model.defer="web_url"></div>
            <div class="mb-1 col-md-4"><label class="form-label">{{ __('dashboard.google-play-url') }}</label><input type="url" class="form-control" wire:model.defer="google_play_url"></div>
            <div class="mb-1 col-md-4"><label class="form-label">{{ __('dashboard.app-store-url') }}</label><input type="url" class="form-control" wire:model.defer="app_store_url"></div>
        </div>
        <div class="row">
            <div class="mb-1 col-md-4"><label class="form-label">{{ __('dashboard.repository-url') }}</label><input type="url" class="form-control" wire:model.defer="repository_url"></div>
            <div class="mb-1 col-md-4"><label class="form-label">{{ __('dashboard.case-study-url') }}</label><input type="url" class="form-control" wire:model.defer="case_study_url"></div>
            <div class="mb-1 col-md-4"><label class="form-label">{{ __('dashboard.client-name') }}</label><input type="text" class="form-control" wire:model.defer="client_name"></div>
        </div>

        <div class="row">
            <div class="mb-1 col-md-6"><label class="form-label">{{ __('dashboard.seo-title-ar') }}</label><input type="text" class="form-control" wire:model.defer="seo_title_ar"></div>
            <div class="mb-1 col-md-6"><label class="form-label">{{ __('dashboard.seo-title-en') }}</label><input type="text" class="form-control" wire:model.defer="seo_title_en"></div>
        </div>
        <div class="row">
            <div class="mb-1 col-md-6"><label class="form-label">{{ __('dashboard.seo-description-ar') }}</label><textarea class="form-control" rows="4" wire:model.defer="seo_description_ar"></textarea></div>
            <div class="mb-1 col-md-6"><label class="form-label">{{ __('dashboard.seo-description-en') }}</label><textarea class="form-control" rows="4" wire:model.defer="seo_description_en"></textarea></div>
        </div>
        <div class="mb-2">
            <label class="form-label">{{ __('dashboard.seo-keywords') }}</label>
            <textarea class="form-control" rows="3" wire:model.defer="seo_keywords_text"></textarea>
        </div>

        <div class="mt-3">
            <h5>{{ __('dashboard.gallery-images') }}</h5>
            @foreach ($galleryRows as $index => $row)
                <div class="border rounded p-2 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-2">
                            <img src="{{ app(\App\Utils\ImageManger::class)->url($row['image']) }}" class="img-fluid rounded">
                        </div>
                        <div class="col-md-4"><label class="form-label">{{ __('dashboard.alt-text-ar') }}</label><input type="text" class="form-control" wire:model.defer="galleryRows.{{ $index }}.alt_text_ar"></div>
                        <div class="col-md-4"><label class="form-label">{{ __('dashboard.alt-text-en') }}</label><input type="text" class="form-control" wire:model.defer="galleryRows.{{ $index }}.alt_text_en"></div>
                        <div class="col-md-1"><label class="form-label">{{ __('dashboard.sort-order') }}</label><input type="number" min="0" class="form-control" wire:model.defer="galleryRows.{{ $index }}.sort_order"></div>
                        <div class="col-md-1 d-flex align-items-end"><button type="button" class="btn btn-outline-danger btn-sm" wire:click="removeGalleryRow({{ $index }})">{{ __('dashboard.delete') }}</button></div>
                    </div>
                </div>
            @endforeach
            <div class="mb-2">
                <label class="form-label">{{ __('dashboard.add-gallery-images') }}</label>
                <input type="file" multiple class="form-control" wire:model="new_gallery_images">
            </div>
        </div>

        <button type="submit" class="btn btn-primary waves-effect waves-float waves-light mt-2">{{ __('dashboard.submit') }}</button>
    </form>
</div>
