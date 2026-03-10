@extends('dashboard.master', ['title' => 'Portfolio Navigation'])
@section('portfolio-open', 'open')
@section('portfolio-navigation-active', 'active')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ $link ? __('dashboard.update') : __('dashboard.create') }} {{ __('dashboard.portfolio-navigation') }}</h4>
                </div>
                <div class="card-body">
                    @livewire('dashboard.portfolio.navigation.nav-link-form', ['link' => $link], key('nav-link-form-' . ($link?->id ?? 'new')))
                </div>
            </div>
        </div>
    </div>
@endsection
