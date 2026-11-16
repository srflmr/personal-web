<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $blog['title'] }} | {{ config('site.name') }}</title>
</head>
<body>
    <h1>{{ $blog['title'] }}</h1>
    <p>{{ $blog['category'] }}, {{ $blog['published_at'] }}, {{ $readingMinutes }} min read</p>

    {{-- Safe to print unescaped: the controller renders Markdown with raw HTML stripped. --}}
    {!! $contentHtml !!}

    <h2>Sources</h2>
    <ul>
        @foreach ($blog['sources'] as $source)
            <li><a href="{{ $source['url'] }}" target="_blank" rel="noopener noreferrer">{{ $source['title'] }}</a></li>
        @endforeach
    </ul>

    <h2>More articles</h2>
    <ul>
        @foreach ($otherBlogs as $other)
            <li><a href="{{ route('blog.show', $other['slug']) }}">{{ $other['title'] }}</a></li>
        @endforeach
    </ul>

    <p><a href="{{ route('blog.index') }}">Back to blog</a></p>
</body>
</html>
