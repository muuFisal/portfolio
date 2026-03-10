<div class="table-responsive">
    <div class="card-header px-0">
        <input type="text" wire:model.live="search" class="form-control w-25"
            placeholder="{{ __('dashboard.search-here') }}">
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>{{ __('dashboard.image') }}</th>
                <th>{{ __('dashboard.title') }}</th>
                <th>{{ __('dashboard.slug') }}</th>
                <th>{{ __('dashboard.category') }}</th>
                <th>{{ __('dashboard.featured') }}</th>
                <th>{{ __('dashboard.images') }}</th>
                <th>{{ __('dashboard.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $item)
                <tr>
                    <td>
                        @if ($item->cover_image)
                            <img src="{{ app(\App\Utils\ImageManger::class)->url($item->cover_image) }}" alt="cover" width="90">
                        @endif
                    </td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->slug }}</td>
                    <td>{{ $item->category ?: '--' }}</td>
                    <td>{{ $item->featured ? __('dashboard.yes') : __('dashboard.no') }}</td>
                    <td>{{ $item->images_count }}</td>
                    <td>
                        <div class="d-flex gap-1">
                            @can('portfolio_projects_view')
                                <a href="{{ route('dashboard.portfolio.projects.show', $item) }}"
                                    class="btn btn-primary waves-effect waves-float waves-light">
                                    <i data-feather="eye"></i>
                                </a>
                            @endcan
                            @can('portfolio_projects_update')
                                <a href="{{ route('dashboard.portfolio.projects.edit', $item) }}"
                                    class="btn btn-info waves-effect waves-float waves-light">
                                    <i data-feather="edit"></i>
                                </a>
                            @endcan
                            @can('portfolio_projects_delete')
                                <button type="button" class="btn btn-danger waves-effect waves-float waves-light"
                                    wire:click="confirmDelete({{ $item->id }})">
                                    <i data-feather="trash"></i>
                                </button>
                            @endcan
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-danger">{{ __('dashboard.no-data') }}</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $data->links() }}
</div>
