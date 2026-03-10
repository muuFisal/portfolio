@extends('dashboard.master', ['title' => 'Portfolio Home Sections'])
@section('portfolio-open', 'open')
@section('portfolio-sections-active', 'active')

@section('content')
    <div class="row">
        @foreach ($sections as $key => $meta)
            <div class="col-lg-4 col-md-6 mb-2">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('dashboard.' . $meta['label_key']) }}</h5>
                        <p class="card-text text-muted">{{ __('dashboard.' . $meta['description_key']) }}</p>
                        <a href="{{ route('dashboard.portfolio.sections.edit', ['key' => $key]) }}"
                            class="btn btn-primary waves-effect waves-float waves-light">
                            {{ __('dashboard.update') }}
                        </a>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="col-lg-4 col-md-6 mb-2">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">{{ __('dashboard.' . $contactSection['label_key']) }}</h5>
                    <p class="card-text text-muted">{{ __('dashboard.' . $contactSection['description_key']) }}</p>
                    <a href="{{ route('dashboard.portfolio.sections.edit', ['key' => 'contact.info']) }}"
                        class="btn btn-primary waves-effect waves-float waves-light">
                        {{ __('dashboard.update') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
