@extends('dashboard.master', ['title' => 'Portfolio Profile'])
@section('portfolio-open', 'open')
@section('portfolio-profile-active', 'active')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('dashboard.portfolio-profile') }}</h4>
                </div>
                <div class="card-body">
                    @livewire('dashboard.portfolio.profile.update-portfolio-profile')
                </div>
            </div>
        </div>
    </div>
@endsection
