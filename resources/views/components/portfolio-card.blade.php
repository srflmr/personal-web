@props(['project', 'featured' => false])

<article @class(['tile tile-sm h-100 d-flex flex-column gap-3', 'tile-accent' => $featured])>
    {{-- Decorative illustration, so the alt text is empty. --}}
    <img class="tile-image" src="{{ asset($project['image']) }}" alt="" width="640" height="360" loading="lazy">

    <p class="meta d-flex flex-wrap justify-content-between gap-2 mb-0">
        @isset($project['context'])
            <span>{{ $project['context'] }}</span>
        @endisset
        <time datetime="{{ $project['published_at'] }}">{{ date('j M Y', strtotime($project['published_at'])) }}</time>
    </p>

    <h3 class="h4 fw-semibold mb-0">
        <a class="tile-link" href="{{ route('portfolio.show', $project['slug']) }}">{{ $project['title'] }}</a>
    </h3>

    <p class="mb-0">{{ $project['description'] }}</p>

    <p class="meta mb-0">
        {{ implode(' · ', array_slice($project['technologies'], 0, 4)) }}
        @if (count($project['technologies']) > 4)
            &middot; +{{ count($project['technologies']) - 4 }}
        @endif
    </p>

    <div class="d-flex flex-wrap gap-2 mt-auto pt-2">
        <a class="btn btn-dark" href="{{ route('portfolio.show', $project['slug']) }}">View details<span class="visually-hidden">: {{ $project['title'] }}</span></a>

        @if ($project['demo_url'])
            <a class="btn btn-outline-dark" href="{{ $project['demo_url'] }}" target="_blank" rel="noopener noreferrer">Live demo</a>
        @elseif ($project['repository_url'])
            <a class="btn btn-outline-dark" href="{{ $project['repository_url'] }}" target="_blank" rel="noopener noreferrer">Source code</a>
        @else
            <span class="chip align-self-center">Private project</span>
        @endif
    </div>
</article>
