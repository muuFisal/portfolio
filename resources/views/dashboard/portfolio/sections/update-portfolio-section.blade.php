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
                <label class="form-label">{{ __('dashboard.subtitle-ar') }}</label>
                <input type="text" class="form-control" wire:model.defer="subtitle_ar">
                @include('dashboard.includes.error', ['property' => 'subtitle_ar'])
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label">{{ __('dashboard.subtitle-en') }}</label>
                <input type="text" class="form-control" wire:model.defer="subtitle_en">
                @include('dashboard.includes.error', ['property' => 'subtitle_en'])
            </div>
        </div>

        @if ($sectionKey === 'about')
            <div class="row">
                <div class="mb-1 col-md-6">
                    <label class="form-label">{{ __('dashboard.story-ar') }}</label>
                    <textarea class="form-control" rows="4" wire:model.defer="story_ar"></textarea>
                </div>
                <div class="mb-1 col-md-6">
                    <label class="form-label">{{ __('dashboard.story-en') }}</label>
                    <textarea class="form-control" rows="4" wire:model.defer="story_en"></textarea>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-3 mb-1">
                <h5 class="mb-0">{{ __('dashboard.values') }}</h5>
                <button type="button" class="btn btn-outline-primary btn-sm" wire:click="addValueRow">
                    {{ __('dashboard.add-item') }}
                </button>
            </div>
            @foreach ($valueRows as $index => $row)
                <div class="border rounded p-2 mb-2">
                    <div class="row">
                        <div class="mb-1 col-md-6">
                            <label class="form-label">{{ __('dashboard.title-ar') }}</label>
                            <input type="text" class="form-control" wire:model.defer="valueRows.{{ $index }}.title_ar">
                        </div>
                        <div class="mb-1 col-md-6">
                            <label class="form-label">{{ __('dashboard.title-en') }}</label>
                            <input type="text" class="form-control" wire:model.defer="valueRows.{{ $index }}.title_en">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-1 col-md-6">
                            <label class="form-label">{{ __('dashboard.description-ar') }}</label>
                            <textarea class="form-control" rows="3" wire:model.defer="valueRows.{{ $index }}.description_ar"></textarea>
                        </div>
                        <div class="mb-1 col-md-6">
                            <label class="form-label">{{ __('dashboard.description-en') }}</label>
                            <textarea class="form-control" rows="3" wire:model.defer="valueRows.{{ $index }}.description_en"></textarea>
                        </div>
                    </div>
                    <button type="button" class="btn btn-outline-danger btn-sm" wire:click="removeValueRow({{ $index }})">
                        {{ __('dashboard.delete') }}
                    </button>
                </div>
            @endforeach
        @elseif ($sectionKey === 'contact.info')
            <div class="row">
                <div class="mb-1 col-md-6">
                    <label class="form-label">{{ __('dashboard.availability-text-ar') }}</label>
                    <textarea class="form-control" rows="3" wire:model.defer="availability_ar"></textarea>
                </div>
                <div class="mb-1 col-md-6">
                    <label class="form-label">{{ __('dashboard.availability-text-en') }}</label>
                    <textarea class="form-control" rows="3" wire:model.defer="availability_en"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="mb-1 col-md-6">
                    <label class="form-label">{{ __('dashboard.office-hours-ar') }}</label>
                    <input type="text" class="form-control" wire:model.defer="office_hours_ar">
                </div>
                <div class="mb-1 col-md-6">
                    <label class="form-label">{{ __('dashboard.office-hours-en') }}</label>
                    <input type="text" class="form-control" wire:model.defer="office_hours_en">
                </div>
            </div>
        @else
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

            @if ($sectionKey === 'home.process')
                <div class="d-flex justify-content-between align-items-center mt-3 mb-1">
                    <h5 class="mb-0">{{ __('dashboard.process-steps') }}</h5>
                    <button type="button" class="btn btn-outline-primary btn-sm" wire:click="addProcessRow">
                        {{ __('dashboard.add-item') }}
                    </button>
                </div>
                @foreach ($processRows as $index => $row)
                    <div class="border rounded p-2 mb-2">
                        <div class="row">
                            <div class="mb-1 col-md-2">
                                <label class="form-label">{{ __('dashboard.step') }}</label>
                                <input type="text" class="form-control" wire:model.defer="processRows.{{ $index }}.step">
                            </div>
                            <div class="mb-1 col-md-5">
                                <label class="form-label">{{ __('dashboard.title-ar') }}</label>
                                <input type="text" class="form-control" wire:model.defer="processRows.{{ $index }}.title_ar">
                            </div>
                            <div class="mb-1 col-md-5">
                                <label class="form-label">{{ __('dashboard.title-en') }}</label>
                                <input type="text" class="form-control" wire:model.defer="processRows.{{ $index }}.title_en">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-1 col-md-6">
                                <label class="form-label">{{ __('dashboard.description-ar') }}</label>
                                <textarea class="form-control" rows="3" wire:model.defer="processRows.{{ $index }}.description_ar"></textarea>
                            </div>
                            <div class="mb-1 col-md-6">
                                <label class="form-label">{{ __('dashboard.description-en') }}</label>
                                <textarea class="form-control" rows="3" wire:model.defer="processRows.{{ $index }}.description_en"></textarea>
                            </div>
                        </div>
                        <button type="button" class="btn btn-outline-danger btn-sm" wire:click="removeProcessRow({{ $index }})">
                            {{ __('dashboard.delete') }}
                        </button>
                    </div>
                @endforeach
            @endif

            @if ($sectionKey === 'home.open_source')
                <div class="d-flex justify-content-between align-items-center mt-3 mb-1">
                    <h5 class="mb-0">{{ __('dashboard.open-source-items') }}</h5>
                    <button type="button" class="btn btn-outline-primary btn-sm" wire:click="addOpenSourceRow">
                        {{ __('dashboard.add-item') }}
                    </button>
                </div>
                @foreach ($openSourceRows as $index => $row)
                    <div class="border rounded p-2 mb-2">
                        <div class="row">
                            <div class="mb-1 col-md-3">
                                <label class="form-label">{{ __('dashboard.name') }}</label>
                                <input type="text" class="form-control" wire:model.defer="openSourceRows.{{ $index }}.name">
                            </div>
                            <div class="mb-1 col-md-3">
                                <label class="form-label">{{ __('dashboard.language') }}</label>
                                <input type="text" class="form-control" wire:model.defer="openSourceRows.{{ $index }}.language">
                            </div>
                            <div class="mb-1 col-md-3">
                                <label class="form-label">{{ __('dashboard.stars') }}</label>
                                <input type="number" min="0" class="form-control" wire:model.defer="openSourceRows.{{ $index }}.stars">
                            </div>
                            <div class="mb-1 col-md-3">
                                <label class="form-label">{{ __('dashboard.url') }}</label>
                                <input type="url" class="form-control" wire:model.defer="openSourceRows.{{ $index }}.url">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-1 col-md-6">
                                <label class="form-label">{{ __('dashboard.description-ar') }}</label>
                                <textarea class="form-control" rows="3" wire:model.defer="openSourceRows.{{ $index }}.description_ar"></textarea>
                            </div>
                            <div class="mb-1 col-md-6">
                                <label class="form-label">{{ __('dashboard.description-en') }}</label>
                                <textarea class="form-control" rows="3" wire:model.defer="openSourceRows.{{ $index }}.description_en"></textarea>
                            </div>
                        </div>
                        <button type="button" class="btn btn-outline-danger btn-sm" wire:click="removeOpenSourceRow({{ $index }})">
                            {{ __('dashboard.delete') }}
                        </button>
                    </div>
                @endforeach
            @endif
        @endif

        <div class="row mt-3">
            <div class="mb-2 col-md-4">
                <label class="form-label">{{ __('dashboard.image') }}</label>
                @if ($image && ! is_object($image))
                    <div class="mb-1">
                        <img src="{{ app(\App\Utils\ImageManger::class)->url($image) }}" class="img-fluid rounded"
                            style="max-height: 120px;">
                    </div>
                @elseif ($image)
                    <div class="mb-1">
                        <img src="{{ $image->temporaryUrl() }}" class="img-fluid rounded" style="max-height: 120px;">
                    </div>
                @endif
                <input type="file" class="form-control" wire:model="image">
                @include('dashboard.includes.error', ['property' => 'image'])
            </div>
            <div class="mb-2 col-md-4">
                <label class="form-label">{{ __('dashboard.status') }}</label>
                <select class="form-select" wire:model.defer="is_active">
                    <option value="1">{{ __('dashboard.active') }}</option>
                    <option value="0">{{ __('dashboard.inactive') }}</option>
                </select>
            </div>
            <div class="mb-2 col-md-4">
                <label class="form-label">{{ __('dashboard.sort-order') }}</label>
                <input type="number" min="0" class="form-control" wire:model.defer="sort_order">
            </div>
        </div>

        <button type="submit" class="btn btn-primary waves-effect waves-float waves-light mt-2">
            {{ __('dashboard.submit') }}
        </button>
    </form>
</div>
