@extends('dashboard.master', ['title' => 'Portfolio Settings'])
@section('portfolio-open', 'open')
@section('portfolio-settings-active', 'active')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('dashboard.portfolio-settings') }}</h4>
                </div>
                <div class="card-body">
                    @livewire('dashboard.portfolio.settings.update-portfolio-settings')
                </div>
            </div>
        </div>
    </div>
@endsection
