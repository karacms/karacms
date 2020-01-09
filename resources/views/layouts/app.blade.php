<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'KaraCMS') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="https://fonts.googleapis.com/css?family=Rubik&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>    
    <div id="app" class="flex">
        <aside style="width: 60px" class="bg-gray-900 p-3 flex flex-col">
            <div class="flex-grow">
            <div class="logo mt-3">
                <div class="flex">
                    <div class="w-3 h-3 bg-green-400"></div>
                    <div class="w-3 h-3 bg-yellow-400 -mt-1 ml-1" style="transform: rotate(45deg)"></div>
                </div>
                <div class="flex">
                    <div class="w-3 h-3 bg-blue-400"></div>
                    <div class="w-3 h-3 bg-red-400"></div>
                </div>
            </div>

            <nav class="mt-6">
                <ul>
                    <li class="text-3xl text-gray-500 hover:text-gray-300 mt-3"><a href="{{url('/dashboard')}}"><view-dashboard-icon class="text-3xl" /></a></li>
                    <li class="text-3xl text-gray-500 hover:text-gray-300 mt-3"><a href="{{url('/dashboard/content')}}"><post-icon /></a></li>
                    <li class="text-3xl text-gray-500 hover:text-gray-300 mt-3"><a title="Extensions" href="{{url('/dashboard/extensions')}}"><hexagon-multiple-icon /></a></li>
                    <li class="text-3xl text-gray-500 hover:text-gray-300 mt-3"><a title="Users" href="{{url('/dashboard/users')}}"><account-group-icon /></a></li>
                    <li class="text-3xl text-gray-500 hover:text-gray-300 mt-3"><a href="{{url('/dashboard/users')}}"><tune-icon /></a></li>
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
            @yield('sidebar')
        </aside>

        <main class="p-6 flex-auto">
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
