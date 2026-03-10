@extends('dashboard.master', ['title' => 'Portfolio Skills'])
@section('portfolio-open', 'open')
@section('portfolio-skills-active', 'active')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">{{ __('dashboard.portfolio-skills') }}</h4>
                    @can('portfolio_skills_create')
                        <a href="{{ route('dashboard.portfolio.skills.create') }}"
                            class="btn btn-primary waves-effect waves-float waves-light">
                            {{ __('dashboard.create') }}
                        </a>
                    @endcan
                </div>
                <div class="card-body">
                    @livewire('dashboard.portfolio.skills.skill-data')
                </div>
            </div>
        </div>
    </div>
@endsection
