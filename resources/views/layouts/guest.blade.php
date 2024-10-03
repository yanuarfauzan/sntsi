<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <link rel="stylesheet" crossorigin href="{{ asset('/assets/compiled/css/app.css') }}">
    <link rel="stylesheet" crossorigin href="{{ asset('/assets/compiled/css/app-dark.css') }}">
    <link rel="stylesheet" crossorigin href="{{ asset('/assets/compiled/css/auth.css') }}">
</head>

<body>
    <script src="{{ asset('assets/static/js/initTheme.js') }}"></script>
    <main>
        @yield('content')
    </main>
</body>

</html>
