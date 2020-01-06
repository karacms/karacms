<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link href="https://fonts.googleapis.com/css?family=Rubik&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" class="flex">
        <aside style="width: 60px" class="bg-gray-900 p-3 flex flex-col">

            <div class="flex-grow">
            <a href="#" title="Go to home">
                <img src="/images/kara.svg" alt="Logo" />
            </a>

            <nav class="mt-6">
                <ul>
                    <li class="text-3xl text-gray-500 hover:text-gray-300 mt-3"><view-dashboard-icon class="text-3xl" /></li>
                    <li class="text-3xl text-gray-500 hover:text-gray-300 mt-3"><post-icon /></li>
                    <li class="text-3xl text-gray-500 hover:text-gray-300 mt-3"><hexagon-multiple-icon /></li>
                    <li class="text-3xl text-gray-500 hover:text-gray-300 mt-3"><account-group-icon /></li>
                    <li class="text-3xl text-gray-500 hover:text-gray-300 mt-3"><tune-icon /></li>
                </ul>
            </nav>
            </div>

            <div class="flex-shrink mb-5">
                <a href="#" title="View profile">
                    <img style="width: 36px; height: 36px;" class="rounded-full shadow-md" src="/images/avatars/linda.jpeg" alt="Linda's Avatar" />
                </a>
            </div>
        </aside>

        <aside style="width: 240px" class="bg-gray-800">
            <div class="px-5 py-3">
                <h1 class="text-2xl mb-5">Users</h1>
                <h2 class="text-base text-gray-600">Users</h2>
                <ul class="mt-4">
                    <li class="mt-4 text-gray-400">All Users</li>
                    <li class="mt-4 text-gray-400">Create New User</li>
                </ul>
            </div>

            <div class="py-3 px-5">
                <h2 class="text-base text-gray-600 mt-10">Roles</h2>
                <ul class="mt-4">
                    <li class="mt-4 text-gray-400">All Roles</li>
                    <li class="mt-4 text-gray-400">Administrators <span class="float-right rounded-full bg-gray-500 w-6 text-center">9</span></li>
                    <li class="mt-4 text-gray-400">Editors <span class="float-right rounded-full bg-gray-500 w-6 text-center">9</span></li>
                    <li class="mt-4 text-gray-400">Subscribers <span class="float-right rounded-full bg-gray-500 w-6 text-center">9</span></li>
                    <li class="mt-4 text-gray-400">Create New Role</li>
                </ul>
            </div>
        </aside>
        <main class="p-6 bg-gray-900 flex-auto">
            <div class="flex flex-col h-full">
                <div class="flex-grow">
                    @include('components/message')
                    @yield('content')
                </div>
                <footer class="text-gray-500 text-sm mt-10">
                    Thanks for creating with KaraCMS.
                </footer>
            </div>
        </main>
    </div>
</body>
</html>
