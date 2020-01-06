@if ( ! empty(session('message')))
<div class="alert alert-warning">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    {!! session('message') !!}
</div>
@endif

@if ($errors->any())
<div class="border border-red-500 m-4 flex">
    <div class="flex-1 p-4">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

    <div class="m-4">
        <button type="button" aria-label="Close">
            <span aria-hidden="true" class="text-2xl">&times;</span>
        </button>
    </div>
</div>
@endif