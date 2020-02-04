<div class="shadow mb-3">
    @if ($field->title)
    <header class="bg-gray-200 px-3 py-2">
        <h3>{{$field->title}}</h3>
    </header>
    @endif

    <section class="p-3">
        {!! $field->renderFields() !!}
    </section>
</div>