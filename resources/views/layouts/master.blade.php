<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <title>@yield('title')</title>
    @yield('extra-meta')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
        <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/Vazirmatn-font-face.css" rel="stylesheet" type="text/css" />
        body {
            font-family: Vazirmatn, sans-serif;
            background-color: #f8f8f8; /* رنگ پس‌زمینه روشن، کمی روشن‌تر برای ظاهر روزنامه */
        }
        /* Custom styles for a newspaper-like feel */
        .newspaper-link {
            color: #555; /* Darker link color */
            transition: color 0.3s ease;
        }
        .newspaper-link:hover {
            color: #000; /* Black on hover */
            text-decoration: underline;
        }
        .newspaper-button {
            background-color: #333; /* Dark button background */
            color: white;
            transition: background-color 0.3s ease;
        }
        .newspaper-button:hover {
            background-color: #000; /* Black on hover */
        }
        button {
            background-color: #333; /* Dark button background */
            color: white;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #000; /* Black on hover */
        }
    </style>
</head>
<body class="antialiased text-gray-800">
    <!-- Header -->
    @include('layouts.header')

    <!-- Main Content Area -->
    @yield('content')

    <!-- Footer -->
    @include('layouts.footer')
</body>
</html>
