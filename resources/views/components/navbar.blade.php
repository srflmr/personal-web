@props(['links'])

<nav class="navbar navbar-expand-lg sticky-top site-nav" aria-label="Main navigation">
    <div class="container">
        <a class="navbar-brand p-0 me-0" href="{{ route('home') }}">
            <img class="site-logo" src="{{ asset('favicon.svg') }}" alt="" width="44" height="44">
            <span class="visually-hidden">{{ config('site.name') }}, home</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-navigation" aria-controls="main-navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="main-navigation">
            <ul class="navbar-nav gap-1">
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
                {{-- theme.js updates the icon, the label, and the selected item. --}}
                <li class="nav-item dropdown">
                    <button class="nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Theme" data-theme-toggle>
                        <i class="bi bi-circle-half" aria-hidden="true"></i>
                        <span class="d-lg-none ms-2">Theme</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <button class="dropdown-item" type="button" data-theme-value="light" aria-pressed="false">
                                <i class="bi bi-sun-fill me-2" aria-hidden="true"></i>Light
                            </button>
                        </li>
                        <li>
                            <button class="dropdown-item" type="button" data-theme-value="dark" aria-pressed="false">
                                <i class="bi bi-moon-stars-fill me-2" aria-hidden="true"></i>Dark
                            </button>
                        </li>
                        <li>
                            <button class="dropdown-item" type="button" data-theme-value="auto" aria-pressed="false">
                                <i class="bi bi-circle-half me-2" aria-hidden="true"></i>Auto
                            </button>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
