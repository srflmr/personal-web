<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portfolio | {{ config('site.name') }}</title>
</head>
<body>
    <h1>Portfolio</h1>
    <ul>
        @forelse ($projects as $project)
            <li>
                <a href="{{ route('portfolio.show', $project['slug']) }}">{{ $project['title'] }}</a>:
                {{ $project['description'] }}
            </li>
        @empty
            <li>No projects yet.</li>
        @endforelse
    </ul>

    <p><a href="{{ route('home') }}">Back to home</a></p>
</body>
</html>
