<div class="mb-3 border p-3">
    <ul>
        @foreach ($field->fields as $pane)
        <li class="inline-block border-b border-2 border-green-400">{{$pane['title']}}</li>
        @endforeach
    </ul>

    <div class="mt-3">
        @foreach ($field->fields as $pane)
            {!! $field->renderFields($pane['fields']) !!}
        @endforeach
    </div>
</div>