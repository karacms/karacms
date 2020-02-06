<div class="mb-3 field-type-textarea">
    {{$field->title}}
    <textarea
            id="{{$field->id}}"
            name="{{$field->key}}"
            placeholder="{{$field->placeholder}}"
            rows="{{$field->rows }}"
            class="{{$field->class}}"
    >{{$field->default}}</textarea>
    <small class="text-small">{{$field->description}}</small>
</div>
