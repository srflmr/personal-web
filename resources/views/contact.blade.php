@extends('layout.default')

@section('title', 'Contact | ' . config('site.name'))

@section('content')
    <h1>Contact</h1>
    <p class="lead mb-5">Open to security conversations, collaborations, and new opportunities. Let's connect.</p>

    <x-section-heading title="Get in touch" />

    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
            <div class="card card-lift h-100 rounded-4 shadow-sm">
                <div class="card-body d-flex align-items-center gap-3">
                    <i class="bi bi-envelope accent-icon fs-2" aria-hidden="true"></i>
                    <div class="min-w-0">
                        <h3 class="h6 mb-1">Email</h3>
                        <a class="stretched-link text-break" href="mailto:{{ config('site.email') }}">{{ config('site.email') }}</a>
                    </div>
                </div>
            </div>
        </div>

        @foreach (config('site.social') as $link)
            <div class="col">
                <div class="card card-lift h-100 rounded-4 shadow-sm">
                    <div class="card-body d-flex align-items-center gap-3">
                        <i class="bi bi-{{ $link['icon'] }} accent-icon fs-2" aria-hidden="true"></i>
                        <div class="min-w-0">
                            <h3 class="h6 mb-1">{{ $link['label'] }}</h3>
                            <a class="stretched-link text-break" href="{{ $link['url'] }}" target="_blank" rel="noopener noreferrer">{{ $link['handle'] }}<span class="visually-hidden"> (opens in new tab)</span></a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
