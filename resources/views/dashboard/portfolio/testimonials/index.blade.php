@extends('dashboard.master', ['title' => 'Portfolio Testimonials'])
@section('portfolio-open', 'open')
@section('portfolio-testimonials-active', 'active')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">{{ __('dashboard.portfolio-testimonials') }}</h4>
                    @can('portfolio_testimonials_create')
                        <a href="{{ route('dashboard.portfolio.testimonials.create') }}"
                            class="btn btn-primary waves-effect waves-float waves-light">
                            {{ __('dashboard.create') }}
                        </a>
                    @endcan
                </div>
                <div class="card-body">
                    @livewire('dashboard.portfolio.testimonials.testimonial-data')
                </div>
            </div>
        </div>
    </div>
@endsection
