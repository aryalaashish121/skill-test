<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Skill Test</title>

    @routes

    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
    @if (app()->environment(['local', 'testing']))
        <script src="{{ mix('js/app.js') }}" defer></script>
    @else
        <script src="{{ mix('js/manifest.js') }}"></script>
        <script src="{{ mix('js/vendor.js') }}"></script>
        <script src="{{ mix('js/app.js') }}" defer></script>
    @endif

    @inertiaHead
</head>
<body class="font-sans antialiased h-full">
    @inertia
</body>
</html>