@extends('dashboard.master', ['title' => 'Portfolio Testimonial'])
@section('portfolio-open', 'open')
@section('portfolio-testimonials-active', 'active')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ $testimonial ? __('dashboard.update') : __('dashboard.create') }} {{ __('dashboard.portfolio-testimonials') }}</h4>
                </div>
                <div class="card-body">
                    @livewire('dashboard.portfolio.testimonials.testimonial-form', ['testimonial' => $testimonial], key('testimonial-form-' . ($testimonial?->id ?? 'new')))
                </div>
            </div>
        </div>
    </div>
@endsection
