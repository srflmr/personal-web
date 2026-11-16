@extends('layout.default')

@section('title', $blog['title'] . ' | ' . config('site.name'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">Blog</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $blog['title'] }}</li>
                </ol>
            </nav>

            <article class="mb-5">
                <h1>{{ $blog['title'] }}</h1>

                <p class="font-monospace small text-body-secondary mb-4">
                    {{ $blog['category'] }}
                    <span aria-hidden="true">&middot;</span>
                    <time datetime="{{ $blog['published_at'] }}">{{ date('j M Y', strtotime($blog['published_at'])) }}</time>
                    <span aria-hidden="true">&middot;</span>
                    {{ $readingMinutes }} min read
                </p>

                <div class="article-body">
                    {{-- Safe to print unescaped: the controller renders Markdown with raw HTML stripped. --}}
                    {!! $contentHtml !!}
                </div>
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

                <div class="row row-cols-1 row-cols-md-2 g-4">
                    @foreach ($otherBlogs as $other)
                        <div class="col">
                            <x-blog-card :blog="$other" />
                        </div>
                    @endforeach
                </div>
            </section>

            <a href="{{ route('blog.index') }}">Back to blog</a>
        </div>
    </div>
@endsection
