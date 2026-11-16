@extends('layout.default')

@section('title', 'About | ' . config('site.name'))

@section('content')
    <h1>About</h1>
    <p class="lead mb-5">{{ $narrative['intro'] }}</p>

    <section class="row g-4 g-lg-5 mb-5">
        <div class="col-lg-8">
            <x-section-heading :title="$narrative['heading']" />

            @foreach ($narrative['paragraphs'] as $paragraph)
                <p>{{ $paragraph }}</p>
            @endforeach
        </div>

        <div class="col-lg-4">
            <div class="card rounded-4 shadow-sm">
                <div class="card-body">
                    <h2 class="h5">Overview</h2>

                    <dl class="mb-0">
                        <dt class="font-monospace small text-body-secondary fw-normal">Current role</dt>
                        <dd>{{ $profile['role'] }}</dd>
                        <dt class="font-monospace small text-body-secondary fw-normal">Company</dt>
                        <dd>{{ $profile['company'] }}</dd>
                        <dt class="font-monospace small text-body-secondary fw-normal">Education</dt>
                        @foreach ($education as $item)
                            <dd class="mb-0">{{ $item['program'] }}, {{ $item['institution'] }}</dd>
                        @endforeach
                    </dl>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-5">
        <x-section-heading title="Skills" />

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($skills as $group)
                <div class="col">
                    <div class="card h-100 rounded-4 shadow-sm">
                        <div class="card-body">
                            <h3 class="h6">{{ $group['category'] }}</h3>

                            <ul class="list-unstyled d-flex flex-wrap gap-2 mb-0">
                                @foreach ($group['items'] as $skill)
                                    <li class="badge bg-body-tertiary text-body border font-monospace fw-normal">{{ $skill }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="mb-5">
        <x-section-heading title="Experience" />

        <ol class="list-unstyled mb-0">
            @foreach ($experience as $job)
                <li class="timeline-item">
                    <span class="timeline-dot" aria-hidden="true"></span>
                    @unless ($loop->last)
                        <span class="timeline-line" aria-hidden="true"></span>
                    @endunless

                    <h3 class="h6 mb-1">{{ $job['role'] }}</h3>
                    <p class="mb-1">{{ $job['organization'] }}</p>
                    <p class="font-monospace small text-body-secondary mb-0">{{ $job['period'] }}</p>
                </li>
            @endforeach
        </ol>
    </section>

    <section class="mb-5">
        <x-section-heading title="Certifications" />

        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-4 mb-4">
            @foreach ($certifications as $certification)
                <div class="col">
                    <figure class="text-center mb-0">
                        <img class="img-fluid" src="{{ asset($certification['image']) }}" alt="{{ $certification['name'] }}" width="120" height="120" loading="lazy">
                        <figcaption class="small text-body-secondary mt-2">{{ $certification['name'] }}</figcaption>
                    </figure>
                </div>
            @endforeach
        </div>

        <p class="mb-0">
            More certifications are available on
            @foreach ($certificationLinks as $link)
                <a href="{{ $link['url'] }}" target="_blank" rel="noopener noreferrer">{{ $link['label'] }}</a>@unless ($loop->last) and @else.@endunless
            @endforeach
        </p>
    </section>

    <section>
        <x-section-heading title="Education" />

        @foreach ($education as $item)
            <div class="card rounded-4 shadow-sm">
                <div class="card-body">
                    <h3 class="h6 mb-1">{{ $item['institution'] }}</h3>
                    <p class="mb-1">{{ $item['program'] }}, {{ $item['level'] }}</p>
                    <p class="font-monospace small text-body-secondary mb-0">{{ $item['period'] }}</p>
                </div>
            </div>
        @endforeach
    </section>
@endsection
