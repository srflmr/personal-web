<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About | {{ $profile['name'] }}</title>
</head>
<body>
    <h1>About</h1>
    <p>{{ $profile['name'] }}, {{ $profile['role'] }}</p>
    <p>{{ $profile['tagline'] }}</p>

    <p><a href="{{ route('home') }}">Back to home</a></p>
</body>
</html>
