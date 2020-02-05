<div class="shadow mb-3 field-type-card field-wrapper">
    @if ($field->title)
    <header class="bg-gray-200 px-3 py-2">
        <h3>{{$field->title}}</h3>
    </header>
    @endif

    <section class="p-3 card-body">
        {!! $field->renderFields() !!}
    </section>
</div>