<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact | {{ config('site.name') }}</title>
</head>
<body>
    <h1>Contact</h1>
    <ul>
        <li>Email: <a href="mailto:{{ config('site.email') }}">{{ config('site.email') }}</a></li>
        @foreach (config('site.social') as $link)
            <li>
                {{ $link['label'] }}:
                <a href="{{ $link['url'] }}" target="_blank" rel="noopener noreferrer">{{ $link['handle'] }}</a>
            </li>
        @endforeach
    </ul>

    <p><a href="{{ route('home') }}">Back to home</a></p>
</body>
</html>
