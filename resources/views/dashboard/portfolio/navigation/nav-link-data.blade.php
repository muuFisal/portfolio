<div class="table-responsive">
    <div class="card-header px-0">
        <input type="text" wire:model.live="search" class="form-control w-25"
            placeholder="{{ __('dashboard.search-here') }}">
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>{{ __('dashboard.name') }}</th>
                <th>{{ __('dashboard.url') }}</th>
                <th>{{ __('dashboard.page-key') }}</th>
                <th>{{ __('dashboard.icon') }}</th>
                <th>{{ __('dashboard.status') }}</th>
                <th>{{ __('dashboard.sort-order') }}</th>
                <th>{{ __('dashboard.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $item)
                <tr>
                    <td>{{ $item->label }}</td>
                    <td>{{ $item->href }}</td>
                    <td>{{ $item->page_key ?: '--' }}</td>
                    <td>{{ $item->icon ?: '--' }}</td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" @checked($item->is_active)
                                wire:click="toggleActive({{ $item->id }})">
                        </div>
                    </td>
                    <td>{{ $item->sort_order }}</td>
                    <td>
                        <div class="d-flex gap-1">
                            @can('portfolio_navigation_update')
                                <a href="{{ route('dashboard.portfolio.navigation.edit', $item) }}"
                                    class="btn btn-info waves-effect waves-float waves-light">
                                    <i data-feather="edit"></i>
                                </a>
                            @endcan
                            @can('portfolio_navigation_delete')
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
