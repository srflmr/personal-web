@extends('layout.default')

@section('title', 'About | ' . config('site.name'))

@section('content')
    <div class="row g-tiles">
        <section class="col-lg-8">
            <div class="tile tile-dark h-100 d-flex flex-column justify-content-center gap-3">
                <p class="eyebrow mb-0">About</p>
                <h1 class="page-title mb-0">{{ $narrative['headline'] }}</h1>
                <p class="lead-text mb-0">{{ $narrative['intro'] }}</p>
            </div>
        </section>

        <section class="col-lg-4" aria-label="Profile">
            <div class="tile tile-sm h-100 d-flex flex-column align-items-center justify-content-center text-center">
                <img class="profile-photo mb-3" src="{{ asset('images/profile.jpg') }}" alt="Portrait of {{ $profile['name'] }}" width="176" height="176">
                <p class="fs-5 fw-semibold text-body-emphasis mb-1">{{ $profile['name'] }}</p>
                <p class="fw-medium text-primary mb-1">{{ $profile['role'] }}</p>
                <p class="small text-body-secondary mb-0">{{ $profile['company'] }}</p>
                @foreach ($education as $item)
                    <p class="small text-body-secondary mb-0">{{ $item['program'] }}, {{ $item['institution'] }}</p>
                @endforeach
            </div>
        </section>
    </div>

    <div class="row g-tiles">
        <section class="col-lg-7">
            <div class="tile h-100">
                <h2 class="h2 fw-bold mb-4">{{ $narrative['heading'] }}</h2>

                @foreach ($narrative['paragraphs'] as $paragraph)
                    <p @class(['lead-text text-body', 'mb-0' => $loop->last])>{{ $paragraph }}</p>
                @endforeach
            </div>
        </section>

        <div class="col-lg-5 stack">
            <section class="tile tile-sm flex-grow-1">
                <x-section-heading title="Experience" />

                <ol class="list-unstyled mb-0">
                    @foreach ($experience as $job)
                        <li class="py-3">
                            <p @class(['meta mb-1', 'text-primary' => $loop->first])>{{ $job['period'] }}</p>
                            <h3 class="h6 fw-semibold mb-1">{{ $job['role'] }}</h3>
                            <p class="small text-body-secondary mb-0">{{ $job['organization'] }}</p>
                        </li>
                        @unless ($loop->last)
                            <li aria-hidden="true"><hr class="tile-divider"></li>
                        @endunless
                    @endforeach
                </ol>
            </section>

            <section class="tile tile-sm tile-accent">
                <x-section-heading title="Education" />

                @foreach ($education as $item)
                    <h3 class="h5 fw-semibold mb-1">{{ $item['institution'] }}</h3>
                    <p class="mb-0">{{ $item['program'] }}, {{ $item['level'] }} &middot; {{ $item['period'] }}</p>
                @endforeach
            </section>
        </div>
    </div>

    <section class="tile tile-dark">
        <x-section-heading title="Skills" :subtitle="count($skills) . ' areas · ' . $skillCount . ' skills'" />

        <div class="hairline-grid">
            @foreach ($skills as $group)
                <div>
                    <h3 class="h6 fw-semibold d-flex align-items-baseline gap-3 mb-3">
                        <span class="index-number" aria-hidden="true">{{ sprintf('%02d', $loop->iteration) }}</span>
                        {{ $group['category'] }}
                    </h3>

                    <ul class="list-unstyled d-flex flex-wrap gap-2 mb-0">
                        @foreach ($group['items'] as $skill)
                            <li class="chip">{{ $skill }}</li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </section>

    <section class="pt-3">
        <div class="d-flex flex-wrap align-items-baseline justify-content-between gap-2 px-2 mb-3">
            <h2 class="tile-label">Certifications</h2>
            <p class="small text-body-secondary mb-0">
                More on
                @foreach ($certificationLinks as $link)
                    <a href="{{ $link['url'] }}" target="_blank" rel="noopener noreferrer">{{ $link['label'] }}</a>@unless ($loop->last) and @else.@endunless
                @endforeach
            </p>
        </div>

        <ul class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-tiles list-unstyled mb-0">
            @foreach ($certifications as $certification)
                <li class="col">
                    <figure class="tile tile-sm h-100 d-flex flex-column align-items-center gap-3 text-center mb-0">
                        <img src="{{ asset($certification['image']) }}" alt="" width="96" height="96" loading="lazy">
                        <figcaption class="small text-body mb-0">{{ $certification['name'] }}</figcaption>
                    </figure>
                </li>
            @endforeach
        </ul>
    </section>
@endsection
