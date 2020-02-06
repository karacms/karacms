<div class="mb-3 field-type-tabs {{$field->class}} tab-{{$field->position}}">
    <nav>
        <ul class="nav nav-tabs border-l" role="tablist">
            @foreach ($field->fields as $index => $pane)
            <li class="nav-item inline-block border-t border-r {{$field->position === 'left' || $field->position === 'right' ? 'w-full' : '' }}">
            <a href="#{{$field->id}}-pane-{{$index}}" class="{{$index === 0 ? 'active' : ''}} py-2 px-2 inline-block w-full border-{{$field->position[0]}}-2 border-transparent" data-toggle="tab" role="tab">{!! $pane['title'] !!}</a>
            </li>
            @endforeach
        </ul>
    </nav>

    <div class="tab-content m{{ $field->position[0] }}-3 w-full">
        @foreach ($field->fields as $index => $pane)
        <div class="tab-pane fade {{$index === 0 ? 'active show' : '' }}" id="{{$field->id}}-pane-{{$index}}" role="tabpanel">
            {!! $field->renderFields($pane['fields']) !!}
        </div>
        @endforeach
    </div>
</div>
