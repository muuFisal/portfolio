<div class="table-responsive">
    <div class="card-header px-0">
        <input type="text" wire:model.live="search" class="form-control w-25"
            placeholder="{{ __('dashboard.search-here') }}">
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>{{ __('dashboard.title') }}</th>
                <th>{{ __('dashboard.category') }}</th>
                <th>{{ __('dashboard.level') }}</th>
                <th>{{ __('dashboard.percent') }}</th>
                <th>{{ __('dashboard.featured') }}</th>
                <th>{{ __('dashboard.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->category }}</td>
                    <td>{{ $item->level_label }}</td>
                    <td>{{ $item->percent }}%</td>
                    <td>{{ $item->featured ? __('dashboard.yes') : __('dashboard.no') }}</td>
                    <td>
                        <div class="d-flex gap-1">
                            @can('portfolio_skills_update')
                                <a href="{{ route('dashboard.portfolio.skills.edit', $item) }}"
                                    class="btn btn-info waves-effect waves-float waves-light">
                                    <i data-feather="edit"></i>
                                </a>
                            @endcan
                            @can('portfolio_skills_delete')
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
