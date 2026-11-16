@props(['blog'])

<article class="card card-lift h-100 rounded-4 shadow-sm">
    <div class="card-body d-flex flex-column">
        <p class="font-monospace small text-body-secondary mb-2">
            {{ $blog['category'] }}
            <span aria-hidden="true">&middot;</span>
            <time datetime="{{ $blog['published_at'] }}">{{ date('d M Y', strtotime($blog['published_at'])) }}</time>
        </p>

        <h3 class="card-title h5">
            <a class="link-body-emphasis text-decoration-none" href="{{ route('blog.show', $blog['slug']) }}">{{ $blog['title'] }}</a>
        </h3>

        <p class="card-text">{{ $blog['excerpt'] }}</p>

        <a class="mt-auto align-self-start" href="{{ route('blog.show', $blog['slug']) }}">
            Read more<span class="visually-hidden">: {{ $blog['title'] }}</span>
        </a>
    </div>
</article>
