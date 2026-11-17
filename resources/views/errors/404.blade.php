@extends('layout.default')

@section('title', 'Page not found | ' . config('site.name'))

@section('content')
    <section class="tile tile-dark d-flex flex-column gap-3">
        <p class="eyebrow mb-0">Error 404</p>
        <h1 class="page-title mb-0">Page not found</h1>
        <p class="lead-text mb-0">The page you are looking for does not exist or has been moved.</p>
        <div class="d-flex flex-wrap gap-2 pt-2">
            <a class="btn btn-accent" href="{{ route('home') }}">Back to home</a>
            <a class="btn btn-outline-light" href="{{ route('blog.index') }}">Read the blog</a>
        </div>
    </section>
@endsection
