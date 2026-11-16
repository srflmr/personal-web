@props(['social'])

<footer class="border-top mt-auto py-4">
    <div class="container d-flex flex-column flex-sm-row align-items-center justify-content-between gap-3">
        <p class="small text-body-secondary mb-0">&copy; {{ date('Y') }} {{ config('site.name') }}. All rights reserved.</p>

        <ul class="list-unstyled d-flex gap-2 mb-0">
            @foreach ($social as $link)
                <li>
                    <a class="touch-target d-inline-flex align-items-center justify-content-center fs-5 text-body-secondary" href="{{ $link['url'] }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $link['label'] }} (opens in new tab)">
                        <i class="bi bi-{{ $link['icon'] }}" aria-hidden="true"></i>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</footer>
