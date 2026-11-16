@extends('layout.default')

@section('title', $blog['title'] . ' | ' . config('site.name'))

@section('content')
    <article class="mb-5">
        <h1>{{ $blog['title'] }}</h1>

        <p class="font-monospace small text-body-secondary">
            {{ $blog['category'] }}
            <span aria-hidden="true">&middot;</span>
            <time datetime="{{ $blog['published_at'] }}">{{ date('d M Y', strtotime($blog['published_at'])) }}</time>
            <span aria-hidden="true">&middot;</span>
            {{ $readingMinutes }} min read
        </p>

        {{-- Safe to print unescaped: the controller renders Markdown with raw HTML stripped. --}}
        {!! $contentHtml !!}
    </article>

    <section class="mb-5">
        <x-section-heading title="Sources" />

        <ul class="mb-0">
            @foreach ($blog['sources'] as $source)
                <li><a href="{{ $source['url'] }}" target="_blank" rel="noopener noreferrer">{{ $source['title'] }}</a></li>
            @endforeach
        </ul>
    </section>

    <section class="mb-5">
        <x-section-heading title="More articles" />

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($otherBlogs as $other)
                <div class="col">
                    <x-blog-card :blog="$other" />
                </div>
            @endforeach
        </div>
    </section>

    <a href="{{ route('blog.index') }}">Back to blog</a>
@endsection
