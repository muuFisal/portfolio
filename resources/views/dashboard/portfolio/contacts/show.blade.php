@extends('dashboard.master', ['title' => 'Portfolio Contact Message'])
@section('portfolio-open', 'open')
@section('portfolio-contacts-active', 'active')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ $contact->name }}</h4>
                </div>
                <div class="card-body">
                    <p><strong>{{ __('dashboard.email') }}:</strong> {{ $contact->email }}</p>
                    <p><strong>{{ __('dashboard.phone') }}:</strong> {{ $contact->phone ?: '--' }}</p>
                    <p><strong>{{ __('dashboard.company') }}:</strong> {{ $contact->company ?: '--' }}</p>
                    <p><strong>{{ __('dashboard.service-interest') }}:</strong> {{ $contact->service_interest ?: '--' }}</p>
                    <p><strong>{{ __('dashboard.budget-range') }}:</strong> {{ $contact->budget_range ?: '--' }}</p>
                    <p><strong>{{ __('dashboard.subject') }}:</strong> {{ $contact->subject ?: '--' }}</p>
                    <p><strong>{{ __('dashboard.status') }}:</strong> {{ $contact->status }}</p>
                    <p><strong>{{ __('dashboard.message') }}:</strong> {{ $contact->message }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
