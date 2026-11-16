@extends('layout.default')

@section('title', $project['title'] . ' | ' . config('site.name'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('portfolio.index') }}">Portfolio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $project['title'] }}</li>
                </ol>
            </nav>

            {{-- Decorative illustration, so the alt text is empty. --}}
            <img class="card-image w-100 rounded-4 shadow-sm mb-4" src="{{ asset($project['image']) }}" alt="" width="640" height="360">

            <h1>{{ $project['title'] }}</h1>

            <p class="font-monospace small text-body-secondary">
                <time datetime="{{ $project['published_at'] }}">{{ date('j M Y', strtotime($project['published_at'])) }}</time>
                @isset($project['context'])
                    <span aria-hidden="true">&middot;</span>
                    {{ $project['context'] }}
                @endisset
            </p>

            <p class="lead">{{ $project['description'] }}</p>

            <div class="mb-5">
                @foreach ($bodyParagraphs as $paragraph)
                    <p>{{ $paragraph }}</p>
                @endforeach
            </div>

            <section class="mb-5">
                <x-section-heading title="Technologies" />

                <ul class="list-unstyled d-flex flex-wrap gap-2 mb-0">
                    @foreach ($project['technologies'] as $technology)
                        <li class="badge bg-body-tertiary text-body border font-monospace fw-normal">{{ $technology }}</li>
                    @endforeach
                </ul>
            </section>

            <div class="d-flex flex-wrap align-items-center gap-3">
                @if ($project['demo_url'])
                    <a class="btn btn-primary" href="{{ $project['demo_url'] }}" target="_blank" rel="noopener noreferrer">Live demo</a>
                @elseif ($project['repository_url'])
                    <a class="btn btn-outline-primary" href="{{ $project['repository_url'] }}" target="_blank" rel="noopener noreferrer">Source code</a>
                @else
                    <span class="badge bg-body-tertiary text-body border font-monospace fw-normal">Private project</span>
                @endif

                <a href="{{ route('portfolio.index') }}">Back to portfolio</a>
            </div>
        </div>
    </div>
@endsection
