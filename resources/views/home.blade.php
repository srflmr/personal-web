@extends('layout.default')

@section('content')
    <section class="mb-5">
        <h1>{{ $profile['name'] }}</h1>
        <p class="lead mb-2">{{ $profile['role'] }}</p>
        <p class="text-body-secondary mb-0">{{ $profile['tagline'] }}</p>
    </section>

    <section class="mb-5">
        <x-section-heading title="Featured projects" />

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($featuredProjects as $project)
                <div class="col">
                    <x-portfolio-card :project="$project" />
                </div>
            @endforeach
        </div>
    </section>

    <section>
        <x-section-heading title="Latest articles" />

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($latestBlogs as $blog)
                <div class="col">
                    <x-blog-card :blog="$blog" />
                </div>
            @endforeach
        </div>
    </section>
@endsection
