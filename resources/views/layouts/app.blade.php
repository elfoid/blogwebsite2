<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Application')</title>
</head>
<body>
    <header>
        <h1>LaraBlog</h1>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} LaraBlog</p>
    </footer>
</body>
</html>
