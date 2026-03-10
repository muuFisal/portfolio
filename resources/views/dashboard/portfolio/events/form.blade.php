@extends('dashboard.master', ['title' => 'Portfolio Event'])
@section('portfolio-open', 'open')
@section('portfolio-events-active', 'active')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ $event ? __('dashboard.update') : __('dashboard.create') }} {{ __('dashboard.portfolio-events') }}</h4>
                </div>
                <div class="card-body">
                    @livewire('dashboard.portfolio.events.event-form', ['event' => $event], key('event-form-' . ($event?->id ?? 'new')))
                </div>
            </div>
        </div>
    </div>
@endsection
