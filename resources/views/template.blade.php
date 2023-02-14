<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@1.*/css/pico.min.css"> --}}
    <link rel="stylesheet" href="https://kit.fontawesome.com/d76d9d2ca0.css" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>

<body class="bg-gray-900 max-h-screen">
    @if (!request()->routeIs('auth.*')) 
    @include('partials/header')
    @endif
    @yield('body')

    <script src="https://kit.fontawesome.com/d76d9d2ca0.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
</body>

</html>
