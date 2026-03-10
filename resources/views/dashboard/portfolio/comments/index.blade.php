@extends('dashboard.master', ['title' => 'Portfolio Comments'])
@section('portfolio-open', 'open')
@section('portfolio-comments-active', 'active')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('dashboard.portfolio-comments') }}</h4>
                </div>
                <div class="card-body">
                    @livewire('dashboard.portfolio.comments.comment-data')
                </div>
            </div>
        </div>
    </div>
@endsection
