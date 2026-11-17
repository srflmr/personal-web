@props(['blog', 'featured' => false])

<article @class(['tile tile-sm h-100 d-flex flex-column gap-3', 'tile-accent' => $featured])>
    <div class="d-flex align-items-start justify-content-between gap-3">
        <p class="meta mb-0">
            <span class="d-block fw-medium">{{ $blog['category'] }}</span>
            <time datetime="{{ $blog['published_at'] }}">{{ date('j M Y', strtotime($blog['published_at'])) }}</time>
        </p>

        {{-- Decorative category illustration, so the alt text is empty. --}}
        <img class="tile-thumb" src="{{ asset($blog['image']) }}" alt="" width="64" height="64" loading="lazy">
    </div>

    <h3 @class(['fw-semibold mb-0', 'h2' => $featured, 'h4' => ! $featured])>
        <a class="tile-link" href="{{ route('blog.show', $blog['slug']) }}">{{ $blog['title'] }}</a>
    </h3>

    <p class="mb-0">{{ $blog['excerpt'] }}</p>

    <a class="mt-auto align-self-start fw-semibold" href="{{ route('blog.show', $blog['slug']) }}">
        Read more<span class="visually-hidden">: {{ $blog['title'] }}</span>
    </a>
</article>
