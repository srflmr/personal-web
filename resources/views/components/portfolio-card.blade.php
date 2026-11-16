@props(['project'])

<article class="card card-lift h-100 rounded-4 shadow-sm overflow-hidden">
    {{-- Decorative illustration, so the alt text is empty. --}}
    <img class="card-img-top card-image" src="{{ asset($project['image']) }}" alt="" width="640" height="360" loading="lazy">

    <div class="card-body d-flex flex-column">
        @isset($project['context'])
            <p class="font-monospace small text-body-secondary mb-2">{{ $project['context'] }}</p>
        @endisset

        <h3 class="card-title h5">
            <a class="link-body-emphasis text-decoration-none" href="{{ route('portfolio.show', $project['slug']) }}">{{ $project['title'] }}</a>
        </h3>

        <p class="card-text">{{ $project['description'] }}</p>

        <ul class="list-unstyled d-flex flex-wrap gap-2 mb-4">
            @foreach ($project['technologies'] as $technology)
                <li class="badge bg-body-tertiary text-body border font-monospace fw-normal">{{ $technology }}</li>
            @endforeach
        </ul>

        <div class="mt-auto">
            @if ($project['demo_url'])
                <a class="btn btn-primary btn-sm" href="{{ $project['demo_url'] }}" target="_blank" rel="noopener noreferrer">Live demo</a>
            @elseif ($project['repository_url'])
                <a class="btn btn-outline-primary btn-sm" href="{{ $project['repository_url'] }}" target="_blank" rel="noopener noreferrer">Source code</a>
            @else
                <span class="badge bg-body-tertiary text-body border font-monospace fw-normal">Private project</span>
            @endif
        </div>
    </div>
</article>
