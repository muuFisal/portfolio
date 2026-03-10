@extends('dashboard.master', ['title' => 'Portfolio Comment'])
@section('portfolio-open', 'open')
@section('portfolio-comments-active', 'active')

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ $comment->name }}</h4>
                </div>
                <div class="card-body">
                    <p><strong>{{ __('dashboard.email') }}:</strong> {{ $comment->email }}</p>
                    <p><strong>{{ __('dashboard.role') }}:</strong> {{ $comment->role ?: '--' }}</p>
                    <p><strong>{{ __('dashboard.rating') }}:</strong> {{ $comment->rating ?: '--' }}</p>
                    <p><strong>{{ __('dashboard.status') }}:</strong> {{ $comment->status }}</p>
                    <p><strong>{{ __('dashboard.source') }}:</strong> {{ $comment->source ?: '--' }}</p>
                    <p><strong>{{ __('dashboard.comment') }}:</strong> {{ $comment->comment }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    @if ($comment->avatar)
                        <img src="{{ app(\App\Utils\ImageManger::class)->url($comment->avatar) }}" class="img-fluid rounded">
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
