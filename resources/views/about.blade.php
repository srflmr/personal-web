@extends('layout.default')

@section('title', 'About | ' . config('site.name'))

@section('content')
    <h1>About</h1>
    <p class="lead mb-2">{{ $profile['name'] }}, {{ $profile['role'] }}</p>
    <p class="text-body-secondary mb-0">{{ $profile['tagline'] }}</p>
@endsection
