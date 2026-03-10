@extends('dashboard.master', ['title' => 'Portfolio Contact Messages'])
@section('portfolio-open', 'open')
@section('portfolio-contacts-active', 'active')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('dashboard.portfolio-contact-messages') }}</h4>
                </div>
                <div class="card-body">
                    @livewire('dashboard.portfolio.contacts.contact-data')
                </div>
            </div>
        </div>
    </div>
@endsection
