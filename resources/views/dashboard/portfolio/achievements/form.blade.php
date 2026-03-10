@extends('dashboard.master', ['title' => 'Portfolio Highlight'])
@section('portfolio-open', 'open')
@section('portfolio-achievements-active', 'active')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ $achievement ? __('dashboard.update') : __('dashboard.create') }} {{ __('dashboard.portfolio-highlights') }}</h4>
                </div>
                <div class="card-body">
                    @livewire('dashboard.portfolio.achievements.achievement-form', ['achievement' => $achievement], key('achievement-form-' . ($achievement?->id ?? 'new')))
                </div>
            </div>
        </div>
    </div>
@endsection
