<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'KaraCMS') }}</title>
    
    <link href="https://fonts.googleapis.com/css?family=Rubik&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.0.1/css/unicons.css">
    <link href="https://transloadit.edgly.net/releases/uppy/v1.8.0/uppy.min.css" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" class="flex">
        <aside style="width: 60px" class="p-3 flex flex-col bg-gray-700">
            <div class="flex-grow">
                <div class="logo mt-3">
                    <img src="https://camo.githubusercontent.com/a41b4c0376d092f829af99e53fa9a6e4cb58a920/68747470733a2f2f6564656e742e6769746875622e696f2f537570657254696e7949636f6e732f696d616765732f7376672f6f70656e636f7265732e737667" alt="Logo" />
                </div>

                <nav class="mt-6">
                    <ul>
                        <li class="text-3xl text-white mt-4 p-0">
                            <a href="{{url('/dashboard/users')}}">
                                {!! svg('line/dashboard', 'hover:bg-gray-500') !!}
                            </a>
                        </li>
                        <li class="text-3xl text-white mt-4 p-0">
                            <a href="{{url('/dashboard/content')}}">
                                {!! svg('line/file', 'hover:bg-gray-500') !!}
                            </a>
                        </li>

                        <li class="text-3xl text-white mt-4 p-0">
                            <a href="{{url('/dashboard/media')}}">
                                {!! svg('line/scenery', 'hover:bg-gray-500') !!}
                            </a>
                        </li>

                        <li class="text-3xl text-white mt-4 p-0">
                            <a href="{{url('/dashboard/users')}}">
                                {!! svg('line/apps', 'hover:bg-gray-500') !!}
                            </a>
                        </li>
                        <li class="text-3xl text-white mt-4 p-0">
                            <a href="{{url('/dashboard/users')}}">
                                {!! svg('line/users-alt', 'hover:bg-gray-500') !!}
                            </a>
                        </li>
                        <li class="text-3xl text-white mt-4 p-0">
                            <a href="{{url('/dashboard/attributes')}}">
                                {!! svg('line/plus-square', 'hover:bg-gray-500') !!}
                            </a>
                        </li>
                        <li class="text-3xl text-white mt-4 p-0">
                            <a href="{{url('/dashboard/attributes')}}">
                                {!! svg('line/sliders-v', 'hover:bg-gray-500') !!}
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="flex-shrink mb-5">
                <a href="#" title="View profile">
                    <img style="width: 36px; height: 36px;" class="rounded-full shadow-md object-cover" src="{{ Auth::user()->avatar }}" alt="Linda's Avatar" />
                </a>
            </div>
        </aside>

        <aside style="width: 240px" class="bg-gray-200">
            @yield('sidebar')
        </aside>

        <main class="p-6 flex-auto">
            <div class="flex flex-col h-full">
                <div class="flex-grow mb-20">
                    @include('components/message')
                    @yield('content')
                </div>
                <footer class="text-gray-500 text-sm">
                    Thanks for creating with <a class="text-indigo-500" href="https://karacms.org">KaraCMS</a>.
                </footer>
            </div>
        </main>
    </div>

    <script>
        var richTexts = {};
        var holders = {};
    </script>

    @stack('scripts')
    <script src="{{ asset('js/app.js') }}" defer></script>
    @stack('afterScripts')
</body>
</html>
