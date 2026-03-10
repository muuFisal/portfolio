<div class="table-responsive">
    <div class="card-header px-0">
        <input type="text" wire:model.live="search" class="form-control w-25"
            placeholder="{{ __('dashboard.search-here') }}">
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>{{ __('dashboard.title') }}</th>
                <th>{{ __('dashboard.description') }}</th>
                <th>{{ __('dashboard.icon') }}</th>
                <th>{{ __('dashboard.value') }}</th>
                <th>{{ __('dashboard.sort-order') }}</th>
                <th>{{ __('dashboard.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->icon ?: '--' }}</td>
                    <td>{{ $item->value }}{{ $item->unit }}</td>
                    <td>{{ $item->sort_order }}</td>
                    <td>
                        <div class="d-flex gap-1">
                            @can('portfolio_achievements_update')
                                <a href="{{ route('dashboard.portfolio.achievements.edit', $item) }}"
                                    class="btn btn-info waves-effect waves-float waves-light">
                                    <i data-feather="edit"></i>
                                </a>
                            @endcan
                            @can('portfolio_achievements_delete')
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
                    <td colspan="6" class="text-center text-danger">{{ __('dashboard.no-data') }}</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $data->links() }}
</div>
