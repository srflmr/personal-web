@extends('layout.default')

@section('title', 'Blog | ' . config('site.name'))

@section('content')
    <h1 class="mb-4">Blog</h1>

    <x-section-heading title="Articles" :subtitle="count($blogs) . ' articles, newest first'" />

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @forelse ($blogs as $blog)
            <div class="col">
                <x-blog-card :blog="$blog" />
            </div>
        @empty
            <div class="col">
                <p class="text-body-secondary mb-0">No articles yet.</p>
            </div>
        @endforelse
    </div>
@endsection
