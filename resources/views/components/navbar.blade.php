@props(['links'])

<nav class="navbar navbar-expand-lg sticky-top bg-body border-bottom" aria-label="Main navigation">
    <div class="container">
        <a class="navbar-brand fw-semibold" href="{{ route('home') }}">{{ config('site.name') }}</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-navigation" aria-controls="main-navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="main-navigation">
            <ul class="navbar-nav ms-auto">
                @foreach ($links as $link)
                    <li class="nav-item">
                        {{-- "blog.index" also matches "blog.*", so the link stays highlighted on detail pages. --}}
                        <a
                            @class(['nav-link', 'active' => request()->routeIs($link['route'], str_replace('.index', '.*', $link['route']))])
                            href="{{ route($link['route']) }}"
                            @if (request()->routeIs($link['route'])) aria-current="page" @endif
                        >{{ $link['label'] }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
