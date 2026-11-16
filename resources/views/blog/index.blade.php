<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog | {{ config('site.name') }}</title>
</head>
<body>
    <h1>Blog</h1>
    <ul>
        @forelse ($blogs as $blog)
            <li>
                <a href="{{ route('blog.show', $blog['slug']) }}">{{ $blog['title'] }}</a>
                ({{ $blog['category'] }}, {{ $blog['published_at'] }}):
                {{ $blog['excerpt'] }}
            </li>
        @empty
            <li>No articles yet.</li>
        @endforelse
    </ul>

    <p><a href="{{ route('home') }}">Back to home</a></p>
</body>
</html>
