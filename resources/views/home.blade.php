@extends('layout.default')

@section('content')
    <section class="row align-items-center g-4 g-lg-5 mb-5">
        <div class="col-lg-5 order-lg-last text-center">
            <img class="hero-photo img-fluid rounded-4 shadow-sm" src="{{ asset('images/profile.jpg') }}" alt="Portrait of {{ $profile['name'] }}" width="827" height="1034">
        </div>

        <div class="col-lg-7">
            <p class="font-monospace text-primary mb-2">Hello, I'm</p>
            <h1 class="display-5 fw-bold">{{ $profile['name'] }}</h1>
            <p class="lead mb-3">{{ $profile['role'] }}</p>
            <p class="text-body-secondary mb-4">{{ $profile['tagline'] }}</p>

            <div class="d-flex flex-wrap gap-2">
                <a class="btn btn-primary" href="{{ route('portfolio.index') }}">View portfolio</a>
                <a class="btn btn-outline-primary" href="{{ route('blog.index') }}">Read the blog</a>
                <a class="btn btn-outline-primary" href="{{ route('about') }}">About me</a>
            </div>
        </div>
    </section>

    <section class="mb-5">
        <x-section-heading title="Focus areas" />

        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($focusAreas as $area)
                <div class="col">
                    <div class="card h-100 rounded-4 shadow-sm">
                        <div class="card-body">
                            <i class="bi bi-{{ $area['icon'] }} accent-icon fs-2" aria-hidden="true"></i>
                            <h3 class="h5 mt-2">{{ $area['title'] }}</h3>
                            <p class="card-text text-body-secondary">{{ $area['text'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="mb-5">
        <x-section-heading title="Featured projects" />

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mb-4">
            @foreach ($featuredProjects as $project)
                {{-- Two columns at md would leave the third card alone on its row. --}}
                <div @class(['col', 'd-md-none d-lg-block' => $loop->iteration === 3])>
                    <x-portfolio-card :project="$project" />
                </div>
            @endforeach
        </div>

        <a class="btn btn-outline-primary" href="{{ route('portfolio.index') }}">View all projects</a>
    </section>

    <section class="mb-5">
        <x-section-heading title="Latest articles" />

        @empty($latestBlogs)
            <p class="text-body-secondary mb-0">No articles yet.</p>
        @else
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mb-4">
                @foreach ($latestBlogs as $blog)
                    <div @class(['col', 'd-md-none d-lg-block' => $loop->iteration === 3])>
                        <x-blog-card :blog="$blog" />
                    </div>
                @endforeach
            </div>

            <a class="btn btn-outline-primary" href="{{ route('blog.index') }}">View all articles</a>
        @endempty
    </section>

    <section class="bg-body-tertiary border rounded-4 p-4 p-lg-5 text-center">
        <h2 class="h3">Let's connect</h2>
        <p class="text-body-secondary mb-4">Whether you're hiring, collaborating, or just want to talk about cybersecurity, reach out.</p>
        <a class="btn btn-primary" href="{{ route('contact') }}">Contact me</a>
    </section>
@endsection
