@extends('layout.default')

@section('title', $project['title'] . ' | ' . config('site.name'))

@section('content')
    <section class="tile tile-dark d-flex flex-column gap-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb meta mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('portfolio.index') }}">Portfolio</a></li>
                <li class="breadcrumb-item active text-body" aria-current="page">{{ $project['title'] }}</li>
            </ol>
        </nav>

        <h1 class="page-title mb-0">{{ $project['title'] }}</h1>
        <p class="lead-text mb-0">{{ $project['description'] }}</p>
    </section>

    <div class="row g-tiles align-items-start">
        <article class="col-lg-8">
            <div class="tile">
                {{-- Decorative illustration, so the alt text is empty. --}}
                <img class="tile-image mb-4" src="{{ asset($project['image']) }}" alt="" width="640" height="360">

                <x-section-heading title="Overview" />

                <div class="article-body">
                    @foreach ($bodyParagraphs as $paragraph)
                        <p @class(['mb-0' => $loop->last])>{{ $paragraph }}</p>
                    @endforeach
                </div>
            </div>
        </article>

        <aside class="col-lg-4 stack">
            <section class="tile tile-sm">
                <x-section-heading title="Details" />

                <dl class="mb-0">
                    @isset($project['context'])
                        <div class="d-flex justify-content-between gap-3 py-2 border-top">
                            <dt class="fw-normal text-body-secondary">Context</dt>
                            <dd class="fw-medium mb-0">{{ $project['context'] }}</dd>
                        </div>
                    @endisset
                    <div class="d-flex justify-content-between gap-3 py-2 border-top">
                        <dt class="fw-normal text-body-secondary">Published</dt>
                        <dd class="meta text-body mb-0"><time datetime="{{ $project['published_at'] }}">{{ date('j M Y', strtotime($project['published_at'])) }}</time></dd>
                    </div>
                </dl>
            </section>

            <section class="tile tile-sm tile-accent">
                <x-section-heading title="Technologies" />

                <ul class="list-unstyled d-flex flex-wrap gap-2 mb-0">
                    @foreach ($project['technologies'] as $technology)
                        <li class="chip font-monospace">{{ $technology }}</li>
                    @endforeach
                </ul>
            </section>

            <div class="d-flex flex-wrap align-items-center gap-2">
                @if ($project['demo_url'])
                    <a class="btn btn-dark" href="{{ $project['demo_url'] }}" target="_blank" rel="noopener noreferrer">Live demo</a>
                @elseif ($project['repository_url'])
                    <a class="btn btn-dark" href="{{ $project['repository_url'] }}" target="_blank" rel="noopener noreferrer">Source code <i class="bi bi-arrow-up-right" aria-hidden="true"></i></a>
                @else
                    <span class="chip">Private project</span>
                @endif

                <a class="btn btn-outline-dark" href="{{ route('portfolio.index') }}">Back to portfolio</a>
            </div>
        </aside>
    </div>
@endsection
