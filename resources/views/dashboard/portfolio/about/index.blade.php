@extends('dashboard.master', ['title' => 'Portfolio About'])
@section('portfolio-open', 'open')
@section('portfolio-about-active', 'active')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('dashboard.portfolio-about') }}</h4>
                </div>
                <div class="card-body">
                    @livewire('dashboard.portfolio.sections.update-portfolio-section', ['sectionKey' => $sectionKey], key('section-' . $sectionKey))
                </div>
            </div>
        </div>
    </div>
@endsection
