<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $profile['name'] }}</title>
</head>
<body>
    <nav>
        <ul>
            @foreach (config('site.navigation') as $link)
                <li><a href="{{ route($link['route']) }}">{{ $link['label'] }}</a></li>
            @endforeach
        </ul>
    </nav>

    <h1>{{ $profile['name'] }}</h1>
    <p>{{ $profile['role'] }}</p>
    <p>{{ $profile['tagline'] }}</p>

    <h2>Featured projects</h2>
    <ul>
        @foreach ($featuredProjects as $project)
            <li>
                <a href="{{ route('portfolio.show', $project['slug']) }}">{{ $project['title'] }}</a>:
                {{ $project['description'] }}
            </li>
        @endforeach
    </ul>

    <h2>Latest articles</h2>
    <ul>
        @foreach ($latestBlogs as $blog)
            <li>
                <a href="{{ route('blog.show', $blog['slug']) }}">{{ $blog['title'] }}</a>
                ({{ $blog['category'] }}, {{ $blog['published_at'] }})
            </li>
        @endforeach
    </ul>
</body>
</html>
