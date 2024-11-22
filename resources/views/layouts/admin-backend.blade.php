<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <x-BackendNavigation.Admin.navbar />
    <x-BackendNavigation.Admin.sidebar />

    <div class="p-4 sm:ml-64">

        @if (session('message'))
            @php
                $type = session('type'); // Ambil tipe dari session
                $bgColor =
                    $type === 'success'
                        ? 'bg-green-100 border-green-400 text-green-700'
                        : 'bg-red-100 border-red-400 text-red-700';
                $progressColor = $type === 'success' ? 'bg-green-600' : 'bg-red-600';
            @endphp

            <div x-data="{ show: true, progress: 100 }" x-show="show" x-init="setTimeout(() => {
                progress = 0;
                setTimeout(() => { show = false }, 5000);
            }, 100);"
                class="fixed top-4 right-4 {{ $bgColor }} border rounded shadow-lg flex flex-col items-start z-50">

                <div class="flex justify-between items-center w-full px-4 py-3">
                    <p class="flex-grow font-semibold">{{ session('message') }}</p>
                    <button @click="show = false" class="ml-4 font-bold text-lg">&times;</button>
                </div>

                <div x-bind:style="`width: ${progress}%;`" class="toast-progress {{ $progressColor }} h-1 rounded">
                </div>
            </div>
        @endif

        <div class="p-4 rounded-lg dark:border-gray-700 mt-14">
            {{ $slot }}
        </div>
    </div>

    @yield('script')

    <script>
        // Script untuk toggle sidebar dan dropdown menu
        document.addEventListener("DOMContentLoaded", function() {
            // Sidebar toggle functionality
            const sidebarToggleButton = document.querySelector(
                '[data-drawer-toggle="logo-sidebar"]'
            );
            const sidebar = document.getElementById("logo-sidebar");

            if (sidebarToggleButton && sidebar) {
                sidebarToggleButton.addEventListener("click", function() {
                    sidebar.classList.toggle("-translate-x-full");
                });
            }

            // Dropdown toggle functionality
            const dropdownToggleButton = document.querySelector(
                '[data-dropdown-toggle="dropdown-user"]'
            );
            const dropdownMenu = document.getElementById("dropdown-user");

            if (dropdownToggleButton && dropdownMenu) {
                dropdownToggleButton.addEventListener("click", function() {
                    dropdownMenu.classList.toggle("hidden");
                });

                // Close dropdown if clicked outside
                window.addEventListener("click", function(event) {
                    if (
                        !dropdownToggleButton.contains(event.target) &&
                        !dropdownMenu.contains(event.target)
                    ) {
                        dropdownMenu.classList.add("hidden");
                    }
                });
            }
        });
    </script>
</body>

</html>
