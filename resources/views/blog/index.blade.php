@extends('layout.default')

@section('title', 'Blog | ' . config('site.name'))

@section('content')
    <section class="tile tile-dark d-flex flex-wrap align-items-end justify-content-between gap-3">
        <div>
            <p class="eyebrow mb-2">Blog</p>
            <h1 class="page-title mb-0">Writing</h1>
        </div>
        <p class="meta mb-0">{{ count($blogs) }} articles &middot; newest first</p>
    </section>

    <h2 class="visually-hidden">All articles</h2>

    <div class="row g-tiles">
        @forelse ($blogs as $blog)
            {{-- The newest article spans the full width; the rest share two columns. --}}
            <div @class(['col-12', 'col-md-6' => ! $loop->first])>
                <x-blog-card :blog="$blog" :featured="$loop->first" />
            </div>
        @empty
            <div class="col-12">
                <p class="text-body-secondary mb-0">No articles yet.</p>
            </div>
        @endforelse
    </div>
@endsection
