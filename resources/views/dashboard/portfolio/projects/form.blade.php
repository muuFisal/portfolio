@extends('dashboard.master', ['title' => 'Portfolio Project'])
@section('portfolio-open', 'open')
@section('portfolio-projects-active', 'active')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ $project ? __('dashboard.update') : __('dashboard.create') }} {{ __('dashboard.portfolio-projects') }}</h4>
                </div>
                <div class="card-body">
                    @livewire('dashboard.portfolio.projects.project-form', ['project' => $project], key('project-form-' . ($project?->id ?? 'new')))
                </div>
            </div>
        </div>
    </div>
@endsection
