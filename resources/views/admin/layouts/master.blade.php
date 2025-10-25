<!DOCTYPE html>
<html lang="fa" dir=@yield('dir','rtl')>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پنل ادمین وبلاگ</title>
    <!-- Tailwind CSS CDN -->
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @yield('extralinks')

    <style>
        /* This custom style is necessary for correct table rendering, not related to theme styling */
        table {
            border-collapse: collapse;
        }
    </style>
    <script>
        // JavaScript to handle active navigation link.
        // In a real Laravel app, these would link to separate routes/pages.
        document.addEventListener('DOMContentLoaded', () => {
            const navLinks = document.querySelectorAll('.nav-link');

            function setActiveLink(clickedLink) {
                navLinks.forEach(link => {
                    link.classList.remove('active', 'bg-gray-700', 'text-white');
                    link.classList.add('bg-transparent', 'text-gray-300');
                });
                clickedLink.classList.add('active', 'bg-gray-700', 'text-white');
                clickedLink.classList.remove('bg-transparent', 'text-gray-300');
            }

            // Set initial active state for Dashboard link
            const initialLink = document.querySelector('.nav-link[data-target="dashboard"]');
            if (initialLink) {
                setActiveLink(initialLink);
            }

            // This script no longer handles section toggling as there's only one visible section
            // It just updates the active state of the sidebar links.
            navLinks.forEach(link => {
                link.addEventListener('click', (e) => {
                    // For a real app, you would prevent default and navigate via Laravel routes.
                    // e.preventDefault();
                    setActiveLink(link);
                    // You might also add logic here to redirect or load content via AJAX if staying on one page
                });
            });
        });
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class='flex flex-row-reverse min-h-screen bg-gray-50 font-sans'>
    @include('admin.layouts.aside')
    <main class="flex-grow p-6 flex flex-col">
        <!-- Header for Main Content -->
        @include('admin.layouts.header')

        <!-- Dashboard Section - Main content of the landing page -->
        @yield('content')
    </main>
    @yield('scripts')
</body>
</html>
