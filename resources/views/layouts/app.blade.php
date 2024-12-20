<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Job Market')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
    <header>
        <h1>Job Market</h1>
        <nav>
            <a href="{{ url('/home') }}">Home</a>
            <a href="{{ url('/about') }}">About</a>
            <a href="{{ url('/perusahaan') }}">Perusahaan</a>
            <a href="{{ url('/lowongan') }}">Lowongan</a>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <p>&copy; 2024 Job Market. All rights reserved.</p>
    </footer>
</body>

</html>