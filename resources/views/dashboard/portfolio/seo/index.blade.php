@extends('dashboard.master', ['title' => 'Portfolio SEO'])
@section('portfolio-open', 'open')
@section('portfolio-seo-active', 'active')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">{{ __('dashboard.portfolio-seo-pages') }}</h4>
                    @can('portfolio_seo_pages_create')
                        <a href="{{ route('dashboard.portfolio.seo-pages.create') }}"
                            class="btn btn-primary waves-effect waves-float waves-light">
                            {{ __('dashboard.create') }}
                        </a>
                    @endcan
                </div>
                <div class="card-body">
                    @livewire('dashboard.portfolio.seo.seo-page-data')
                </div>
            </div>
        </div>
    </div>
@endsection
