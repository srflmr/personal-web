@extends('layout.default')

@section('title', 'Portfolio | ' . config('site.name'))

@section('content')
    <h1 class="mb-4">Portfolio</h1>

    <x-section-heading title="Projects" :subtitle="count($projects) . ' projects, newest first'" />

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @forelse ($projects as $project)
            <div class="col">
                <x-portfolio-card :project="$project" />
            </div>
        @empty
            <div class="col">
                <p class="text-body-secondary mb-0">No projects yet.</p>
            </div>
        @endforelse
    </div>
@endsection
