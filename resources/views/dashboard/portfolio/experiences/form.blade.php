@extends('dashboard.master', ['title' => 'Portfolio Experience'])
@section('portfolio-open', 'open')
@section('portfolio-experiences-active', 'active')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ $experience ? __('dashboard.update') : __('dashboard.create') }} {{ __('dashboard.portfolio-experiences') }}</h4>
                </div>
                <div class="card-body">
                    @livewire('dashboard.portfolio.experiences.experience-form', ['experience' => $experience], key('experience-form-' . ($experience?->id ?? 'new')))
                </div>
            </div>
        </div>
    </div>
@endsection
