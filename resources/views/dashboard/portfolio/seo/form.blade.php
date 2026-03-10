@extends('dashboard.master', ['title' => 'Portfolio SEO'])
@section('portfolio-open', 'open')
@section('portfolio-seo-active', 'active')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ $page ? __('dashboard.update') : __('dashboard.create') }} {{ __('dashboard.portfolio-seo-pages') }}</h4>
                </div>
                <div class="card-body">
                    @livewire('dashboard.portfolio.seo.seo-page-form', ['page' => $page], key('seo-page-form-' . ($page?->id ?? 'new')))
                </div>
            </div>
        </div>
    </div>
@endsection
