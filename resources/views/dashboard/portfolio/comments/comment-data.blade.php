<div class="table-responsive">
    <div class="card-header px-0">
        <input type="text" wire:model.live="search" class="form-control w-25"
            placeholder="{{ __('dashboard.search-here') }}">
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>{{ __('dashboard.name') }}</th>
                <th>{{ __('dashboard.email') }}</th>
                <th>{{ __('dashboard.rating') }}</th>
                <th>{{ __('dashboard.status') }}</th>
                <th>{{ __('dashboard.featured') }}</th>
                <th>{{ __('dashboard.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->rating ?: '--' }}</td>
                    <td>
                        <select class="form-select" wire:change="updateStatus({{ $item->id }}, $event.target.value)">
                            @foreach (config('portfolio.comment_statuses') as $status)
                                <option value="{{ $status }}" @selected($item->status === $status)>{{ $status }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" @checked($item->featured)
                                wire:click="toggleFeatured({{ $item->id }})">
                        </div>
                    </td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('dashboard.portfolio.comments.show', $item->id) }}"
                                class="btn btn-primary waves-effect waves-float waves-light">
                                <i data-feather="eye"></i>
                            </a>
                            @can('portfolio_comments_delete')
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
