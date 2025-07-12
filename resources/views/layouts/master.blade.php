<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    @yield('extra-meta')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif; /* استفاده از فونت Inter */
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
