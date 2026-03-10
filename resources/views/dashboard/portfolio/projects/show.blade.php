@extends('dashboard.master', ['title' => 'Portfolio Project'])
@section('portfolio-open', 'open')
@section('portfolio-projects-active', 'active')

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ $project->title }}</h4>
                </div>
                <div class="card-body">
                    <p>{{ $project->summary }}</p>
                    <p>{{ $project->description }}</p>
                    <div class="mb-2"><strong>{{ __('dashboard.tags') }}:</strong> {{ implode(', ', $project->tags ?? []) }}</div>
                    <div class="mb-2"><strong>{{ __('dashboard.stack') }}:</strong> {{ implode(', ', $project->stack ?? []) }}</div>
                    <div class="mb-2"><strong>{{ __('dashboard.client-name') }}:</strong> {{ $project->client_name ?: '--' }}</div>
                    <div class="mb-2"><strong>{{ __('dashboard.project-date') }}:</strong> {{ optional($project->project_date)->format('Y-m-d') ?: '--' }}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('dashboard.gallery-images') }}</h4>
                </div>
                <div class="card-body">
                    @foreach ($project->images as $image)
                        <div class="mb-2">
                            <img src="{{ app(\App\Utils\ImageManger::class)->url($image->image) }}" class="img-fluid rounded mb-1">
                            <div>{{ $image->alt_text }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
