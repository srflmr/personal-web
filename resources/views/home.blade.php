@extends('layout.default')

@section('content')
    <div class="row g-tiles">
        <section class="col-lg-8">
            <div class="tile tile-dark h-100 d-flex flex-column justify-content-center gap-3">
                <p class="eyebrow mb-0">{{ $profile['role'] }}</p>

                <h1 class="mb-0">
                    <span class="d-block fs-5 fw-medium text-body mb-2">Hello, I'm</span>
                    <span class="display-name">{{ $profile['name'] }}</span>
                </h1>

                <p class="lead-text mb-0">{{ $profile['tagline'] }}</p>

                <div class="d-flex flex-wrap align-items-center gap-2 mt-2">
                    <a class="btn btn-accent" href="{{ route('portfolio.index') }}">View portfolio</a>
                    <a class="btn btn-outline-light" href="{{ route('blog.index') }}">Read the blog</a>
                    <a class="btn btn-outline-light" href="{{ route('about') }}">About me</a>
                </div>
            </div>
        </section>

        <section class="col-lg-4">
            <div class="tile tile-sm h-100">
                <x-section-heading title="Focus" />

                <ul class="list-unstyled mb-0">
                    @foreach ($focusAreas as $area)
                        <li @class(['py-3', 'border-top' => ! $loop->first, 'pt-0' => $loop->first, 'pb-0' => $loop->last])>
                            <h3 class="h6 fw-semibold d-flex align-items-baseline gap-3 mb-1">
                                <span class="index-number" aria-hidden="true">{{ sprintf('%02d', $loop->iteration) }}</span>
                                {{ $area['title'] }}
                            </h3>
                            <p class="small text-body-secondary mb-0">{{ $area['text'] }}</p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
    </div>

    <section class="pt-3">
        <div class="d-flex flex-wrap align-items-baseline justify-content-between gap-2 px-2 mb-3">
            <h2 class="tile-label">Featured projects</h2>
            <a class="fw-semibold" href="{{ route('portfolio.index') }}">View all projects <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
        </div>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-tiles">
            @foreach ($featuredProjects as $project)
                {{-- Two columns at md would leave the third card alone on its row. --}}
                <div @class(['col', 'd-md-none d-lg-block' => $loop->iteration === 3])>
                    <x-portfolio-card :project="$project" :featured="$loop->first" />
                </div>
            @endforeach
        </div>
    </section>

    <div class="row g-tiles">
        <section class="col-lg-8">
            <div class="tile tile-sm h-100">
                <x-section-heading title="Latest writing" />

                @empty($latestBlogs)
                    <p class="text-body-secondary mb-0">No articles yet.</p>
                @else
                    <ul class="list-unstyled mb-3">
                        @foreach ($latestBlogs as $blog)
                            <li class="d-flex flex-column flex-sm-row align-items-sm-baseline justify-content-between gap-1 gap-sm-4 py-3 border-top">
                                <a class="tile-link fs-5 fw-semibold" href="{{ route('blog.show', $blog['slug']) }}">{{ $blog['title'] }}</a>
                                <time class="meta flex-shrink-0" datetime="{{ $blog['published_at'] }}">{{ date('j M Y', strtotime($blog['published_at'])) }}</time>
                            </li>
                        @endforeach
                    </ul>

                    <a class="fw-semibold" href="{{ route('blog.index') }}">All articles <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
                @endempty
            </div>
        </section>

        <section class="col-lg-4">
            <div class="tile tile-sm tile-primary h-100 d-flex flex-column gap-3">
                <h2 class="h2 fw-bold mb-0">Let's connect</h2>
                <p class="mb-0">Whether you're hiring, collaborating, or just want to talk about cybersecurity, reach out.</p>
                <a class="btn btn-light align-self-start mt-auto" href="{{ route('contact') }}">Contact me</a>
            </div>
        </section>
    </div>
@endsection
