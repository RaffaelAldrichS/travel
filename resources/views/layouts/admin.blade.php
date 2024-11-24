<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title', "BuzJet")</title>
    {{-- darkmode flowbite --}}
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>

<body>
    <div class="antialiased bg-gray-50 dark:bg-gray-900">
        <x-nav-bar />
        <x-side-bar />
        <main class="p-4 md:ml-64 h-auto pt-20 min-h-screen">
            @yield('content')
        </main>
    </div>
</body>

</html>
