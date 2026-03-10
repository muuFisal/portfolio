@extends('dashboard.master', ['title' => 'Portfolio Projects'])
@section('portfolio-open', 'open')
@section('portfolio-projects-active', 'active')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">{{ __('dashboard.portfolio-projects') }}</h4>
                    @can('portfolio_projects_create')
                        <a href="{{ route('dashboard.portfolio.projects.create') }}"
                            class="btn btn-primary waves-effect waves-float waves-light">
                            {{ __('dashboard.create') }}
                        </a>
                    @endcan
                </div>
                <div class="card-body">
                    @livewire('dashboard.portfolio.projects.project-data')
                </div>
            </div>
        </div>
    </div>
@endsection
