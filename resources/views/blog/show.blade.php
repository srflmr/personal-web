@extends('layout.default')

@section('title', $blog['title'] . ' | ' . config('site.name'))

@section('content')
    <section class="tile tile-dark d-flex flex-column gap-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb meta mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">Blog</a></li>
                <li class="breadcrumb-item active text-body" aria-current="page">{{ $blog['category'] }}</li>
            </ol>
        </nav>

        <h1 class="page-title mb-0">{{ $blog['title'] }}</h1>
        <p class="lead-text mb-0">{{ $blog['excerpt'] }}</p>
    </section>

    <div class="row g-tiles align-items-start">
        <article class="col-lg-8">
            <div class="tile article-body-tile">
                <div class="article-body">
                    {{-- Safe to print unescaped: the controller renders Markdown with raw HTML stripped. --}}
                    {!! $contentHtml !!}
                </div>
            </div>
        </article>

        <aside class="col-lg-4 stack">
            <section class="tile tile-sm">
                <x-section-heading title="Article" />

                <dl class="mb-0">
                    <div class="d-flex justify-content-between gap-3 py-2 border-top">
                        <dt class="fw-normal text-body-secondary">Category</dt>
                        <dd class="fw-medium mb-0">{{ $blog['category'] }}</dd>
                    </div>
                    <div class="d-flex justify-content-between gap-3 py-2 border-top">
                        <dt class="fw-normal text-body-secondary">Published</dt>
                        <dd class="meta text-body mb-0"><time datetime="{{ $blog['published_at'] }}">{{ date('j M Y', strtotime($blog['published_at'])) }}</time></dd>
                    </div>
                    <div class="d-flex justify-content-between gap-3 py-2 border-top">
                        <dt class="fw-normal text-body-secondary">Reading time</dt>
                        <dd class="meta text-body mb-0">{{ $readingMinutes }} min</dd>
                    </div>
                </dl>
            </section>

            <section class="tile tile-sm tile-accent">
                <x-section-heading title="Sources" />

                <ol class="ps-3 mb-0 d-flex flex-column gap-2">
                    @foreach ($blog['sources'] as $source)
                        <li><a href="{{ $source['url'] }}" target="_blank" rel="noopener noreferrer">{{ $source['title'] }}<span class="visually-hidden"> (opens in new tab)</span></a></li>
                    @endforeach
                </ol>
            </section>
        </aside>
    </div>

    <section class="pt-3">
        <div class="d-flex flex-wrap align-items-baseline justify-content-between gap-2 px-2 mb-3">
            <h2 class="tile-label">More articles</h2>
            <a class="fw-semibold" href="{{ route('blog.index') }}"><i class="bi bi-arrow-left" aria-hidden="true"></i> Back to blog</a>
        </div>

        <div class="row row-cols-1 row-cols-md-2 g-tiles">
            @foreach ($otherBlogs as $other)
                <div class="col">
                    <x-blog-card :blog="$other" />
                </div>
            @endforeach
        </div>
    </section>
@endsection
