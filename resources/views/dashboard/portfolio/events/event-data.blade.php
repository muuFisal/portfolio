<div class="table-responsive">
    <div class="card-header px-0">
        <input type="text" wire:model.live="search" class="form-control w-25"
            placeholder="{{ __('dashboard.search-here') }}">
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>{{ __('dashboard.title') }}</th>
                <th>{{ __('dashboard.type') }}</th>
                <th>{{ __('dashboard.date') }}</th>
                <th>{{ __('dashboard.featured') }}</th>
                <th>{{ __('dashboard.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->type ?: '--' }}</td>
                    <td>{{ optional($item->date)->format('Y-m-d') }}</td>
                    <td>{{ $item->featured ? __('dashboard.yes') : __('dashboard.no') }}</td>
                    <td>
                        <div class="d-flex gap-1">
                            @can('portfolio_events_update')
                                <a href="{{ route('dashboard.portfolio.events.edit', $item) }}"
                                    class="btn btn-info waves-effect waves-float waves-light">
                                    <i data-feather="edit"></i>
                                </a>
                            @endcan
                            @can('portfolio_events_delete')
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
                    <td colspan="5" class="text-center text-danger">{{ __('dashboard.no-data') }}</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $data->links() }}
</div>
