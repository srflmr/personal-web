@extends('layout.default')

@section('title', 'Contact | ' . config('site.name'))

@section('content')
    <div class="row g-tiles">
        <section class="col-lg-7">
            <div class="tile tile-dark h-100 d-flex flex-column justify-content-center gap-3">
                <p class="eyebrow mb-0">Contact</p>
                <h1 class="page-title mb-0">Let's connect</h1>
                <p class="lead-text mb-0">Open to security conversations, collaborations, and new opportunities. Let's connect.</p>
            </div>
        </section>

        <div class="col-lg-5">
            <div class="tile tile-primary card-lift h-100 d-flex flex-column gap-2">
                <i class="bi bi-envelope fs-3" aria-hidden="true"></i>
                <h2 class="meta mt-auto mb-0 pt-4">Email</h2>
                <a class="stretched-link fs-4 fw-semibold text-break" href="mailto:{{ config('site.email') }}">{{ config('site.email') }}</a>
            </div>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-tiles">
        @foreach (config('site.social') as $link)
            <div class="col">
                <div class="tile tile-sm card-lift h-100 d-flex flex-column gap-2">
                    <i class="bi bi-{{ $link['icon'] }} fs-3 text-primary" aria-hidden="true"></i>
                    <h2 class="h5 fw-semibold mt-auto mb-0 pt-4">{{ $link['label'] }}</h2>
                    <a class="stretched-link meta text-break" href="{{ $link['url'] }}" target="_blank" rel="noopener noreferrer">{{ $link['handle'] }}<span class="visually-hidden"> (opens in new tab)</span></a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
