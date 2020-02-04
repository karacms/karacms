<div class="rounded shadow mb-3">
    <header class="rounded-t bg-gray-300 px-3 py-2">
        <h3>{{$field->title}}</h3>
    </header>

    <section class="p-3">
        {!! $field->renderFields() !!}
    </section>
</div>