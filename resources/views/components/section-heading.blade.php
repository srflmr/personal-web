@props(['title', 'subtitle' => null])

<div class="mb-4">
    <h2 class="h3 mb-1">{{ $title }}</h2>
    @if ($subtitle)
        <p class="text-body-secondary mb-0">{{ $subtitle }}</p>
    @endif
</div>
