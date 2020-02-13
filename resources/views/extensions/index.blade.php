@extends('layouts.app')

@section('sidebar')
    @include('sidebars/extensions')
@endsection

@section('content')
<h1>Extensions</h1>

<div class="extension-list grid grid-cols-5 gap-5 mt-6">
    @foreach ($extensions['installed'] as $extension)
    <form method="post" action="{{url('dashboard/extensions')}}">
        @csrf
        <div class="extension bg-gray-100 shadow">
            <header>
                <img src="https://picsum.photos/300/200" alt="F" />
            </header>

            <section class="p-3">
                <h3 class="mt-2 text-xl">{{$extension->title}}</h3>
                <p class="mt-1 text-gray-400 font-light">{{$extension->description}}</p>
            </section>

            <footer class="flex justify-between p-3">

                @if ($extension->status === 'not-installed')
                <div class="mt-4 text-small">{{$extension->price}}</div>
                @endif

                @if ($extension->status === 'installed')
                <input type="hidden" name="activate[]" value="{{$extension->name}}" />
                <button class="mt-4 px-2 py-1 rounded-sm bg-blue-400 text-white text-sm">Activate</button>
                <button class="mt-4 px-2 py-1 rounded-sm bg-red-400 text-white text-sm">Uninstall</button>
                @endif

                @if ($extension->status === 'activated')
                <input type="hidden" name="deactivate[]" value="{{$extension->name}}" />
                <button class="mt-4 px-2 py-1 rounded-sm bg-orange-600 text-white text-sm">Deactivate</button>
                @endif
            </footer>
        </div>
    </form>
    @endforeach
</div>

@endsection