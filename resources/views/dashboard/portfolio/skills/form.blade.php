@extends('dashboard.master', ['title' => 'Portfolio Skill'])
@section('portfolio-open', 'open')
@section('portfolio-skills-active', 'active')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ $skill ? __('dashboard.update') : __('dashboard.create') }} {{ __('dashboard.portfolio-skills') }}</h4>
                </div>
                <div class="card-body">
                    @livewire('dashboard.portfolio.skills.skill-form', ['skill' => $skill], key('skill-form-' . ($skill?->id ?? 'new')))
                </div>
            </div>
        </div>
    </div>
@endsection
