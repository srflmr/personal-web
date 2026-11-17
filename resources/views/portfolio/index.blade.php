@extends('layout.default')

@section('title', 'Portfolio | ' . config('site.name'))

@section('content')
    <section class="tile tile-dark d-flex flex-wrap align-items-end justify-content-between gap-3">
        <div>
            <p class="eyebrow mb-2">Portfolio</p>
            <h1 class="page-title mb-0">Projects</h1>
        </div>
        <p class="meta mb-0">{{ count($projects) }} projects &middot; newest first</p>
    </section>

    <h2 class="visually-hidden">All projects</h2>

    <div class="row row-cols-1 row-cols-md-2 g-tiles">
        @forelse ($projects as $project)
            <div class="col">
                <x-portfolio-card :project="$project" :featured="$loop->first" />
            </div>
        @empty
            <div class="col">
                <p class="text-body-secondary mb-0">No projects yet.</p>
            </div>
        @endforelse
    </div>
@endsection
