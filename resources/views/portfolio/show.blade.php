<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $project['title'] }} | {{ config('site.name') }}</title>
</head>
<body>
    <h1>{{ $project['title'] }}</h1>
    <p>{{ $project['published_at'] }}</p>
    @isset($project['context'])
        <p>{{ $project['context'] }}</p>
    @endisset
    <p>{{ $project['description'] }}</p>
    <p>{{ $project['body'] }}</p>

    <h2>Technologies</h2>
    <ul>
        @foreach ($project['technologies'] as $technology)
            <li>{{ $technology }}</li>
        @endforeach
    </ul>

    @if ($project['demo_url'])
        <p><a href="{{ $project['demo_url'] }}" target="_blank" rel="noopener noreferrer">Live demo</a></p>
    @elseif ($project['repository_url'])
        <p><a href="{{ $project['repository_url'] }}" target="_blank" rel="noopener noreferrer">Source code</a></p>
    @else
        <p>Private project</p>
    @endif

    <p><a href="{{ route('portfolio.index') }}">Back to portfolio</a></p>
</body>
</html>
