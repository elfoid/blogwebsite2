<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Default Title' }}</title>
    <!-- Include your CSS/JS here -->
</head>
<body>
    <header>
        <h1>LaraBlog Layout</h1>
    </header>

    <main>
        {{ $slot }}
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} My APP</p>
    </footer>
</body>
</html>