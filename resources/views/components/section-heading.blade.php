@props(['title', 'subtitle' => null])

<div class="d-flex flex-wrap align-items-baseline justify-content-between gap-2 mb-3">
    <h2 class="tile-label">{{ $title }}</h2>
    @if ($subtitle)
        <p class="meta mb-0">{{ $subtitle }}</p>
    @endif
</div>
