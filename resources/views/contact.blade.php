@extends('layout.default')

@section('title', 'Contact | ' . config('site.name'))

@section('content')
    <h1>Contact</h1>

    <ul class="list-unstyled mb-0">
        <li class="mb-2">
            <i class="bi bi-envelope me-2" aria-hidden="true"></i>Email:
            <a href="mailto:{{ config('site.email') }}">{{ config('site.email') }}</a>
        </li>
        @foreach (config('site.social') as $link)
            <li class="mb-2">
                <i class="bi bi-{{ $link['icon'] }} me-2" aria-hidden="true"></i>{{ $link['label'] }}:
                <a href="{{ $link['url'] }}" target="_blank" rel="noopener noreferrer">{{ $link['handle'] }}</a>
            </li>
        @endforeach
    </ul>
@endsection
