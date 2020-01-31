<div class="mb-3 border p-3">
    <ul>
        @foreach ($field['panes'] as $pane)
        <li class="inline-block border-b border-2 border-green-400">{{$pane['title']}}</li>
        @endforeach
    </ul>

    <div class="mt-3">
        @foreach ($field['panes'] as $pane)
            @foreach ($pane['fields'] as $field)
                {{\App\Attribute::render($field)}}
            @endforeach
        @endforeach
    </div>
</div>