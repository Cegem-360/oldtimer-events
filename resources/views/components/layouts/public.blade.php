@props(['title' => null])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.head', ['title' => $title])
</head>
<body class="bg-brand-parchment font-sans antialiased" x-data>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @include('partials.navbar')

    <main>
        {{ $slot }}
    </main>

    @include('partials.footer')
</body>
</html>
