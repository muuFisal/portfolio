@extends('dashboard.master', ['title' => 'Portfolio Highlights'])
@section('portfolio-open', 'open')
@section('portfolio-achievements-active', 'active')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">{{ __('dashboard.portfolio-highlights') }}</h4>
                    @can('portfolio_achievements_create')
                        <a href="{{ route('dashboard.portfolio.achievements.create') }}"
                            class="btn btn-primary waves-effect waves-float waves-light">
                            {{ __('dashboard.create') }}
                        </a>
                    @endcan
                </div>
                <div class="card-body">
                    @livewire('dashboard.portfolio.achievements.achievement-data')
                </div>
            </div>
        </div>
    </div>
@endsection
