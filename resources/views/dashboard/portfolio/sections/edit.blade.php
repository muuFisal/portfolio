@extends('dashboard.master', ['title' => 'Portfolio Section'])
@section('portfolio-open', 'open')
@section('portfolio-sections-active', 'active')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('dashboard.' . $sectionMeta['label_key']) }}</h4>
                </div>
                <div class="card-body">
                    @livewire('dashboard.portfolio.sections.update-portfolio-section', ['sectionKey' => $sectionKey], key('section-edit-' . $sectionKey))
                </div>
            </div>
        </div>
    </div>
@endsection
