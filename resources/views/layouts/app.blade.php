<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'KaraCMS') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="https://fonts.googleapis.com/css?family=Rubik&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.0.1/css/unicons.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" class="flex">
        <aside style="width: 60px" class="p-3 flex flex-col bg-gray-500">
            <div class="flex-grow">
                <div class="logo mt-3">
                    <img src="/images/kara.svg" alt="Logo" />
                </div>

                <nav class="mt-6">
                    <ul>
                        <li class="text-3xl text-white mt-3 p-0">
                            <a href="{{url('/dashboard/users')}}">
                                <span class="uim-svg hover:bg-gray-400">{!! svg('line/dashboard') !!}</span>
                            </a>
                        </li>
                        <li class="text-3xl text-white mt-3 p-0">
                            <a href="{{url('/dashboard/users')}}">
                                <span class="uim-svg hover:bg-gray-400">{!! svg('line/file') !!}</span>
                            </a>
                        </li>
                        <li class="text-3xl text-white mt-3 p-0">
                            <a href="{{url('/dashboard/users')}}">
                                <span class="uim-svg hover:bg-gray-400">{!! svg('line/cube') !!}</span>
                            </a>
                        </li>
                        <li class="text-3xl text-white mt-3 p-0">
                            <a href="{{url('/dashboard/users')}}">
                                <span class="uim-svg hover:bg-gray-400">{!! svg('line/users-alt') !!}</span>
                            </a>
                        </li>
                        <li class="text-3xl text-white mt-3 p-0">
                            <a href="{{url('/dashboard/users')}}">
                                <span class="uim-svg hover:bg-gray-400">{!! svg('line/sliders-v') !!}</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="flex-shrink mb-5">
                <a href="#" title="View profile">
                    <img style="width: 36px; height: 36px;" class="rounded-full shadow-md" src="/images/avatars/linda.jpeg" alt="Linda's Avatar" />
                </a>
            </div>
        </aside>

        <aside style="width: 240px" class="bg-gray-100">
            @yield('sidebar')
        </aside>

        <main class="p-6 flex-auto">
            <div class="flex flex-col h-full">
                <div class="flex-grow">
                    @include('components/message')
                    @yield('content')
                </div>
                <footer class="text-gray-500 text-sm mt-10">
                    Thanks for creating with <a class="text-cyan-500" href="https://karacms.org">KaraCMS</a>.
                </footer>
            </div>
        </main>
    </div>
</body>
</html>
