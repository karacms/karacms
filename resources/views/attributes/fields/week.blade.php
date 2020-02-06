<div class="mb-3 field-type-week">
    <label>{{$field->title}}</label>
    <input type="week"
            name="{{$field->key}}"
            placeholder="{{$field->placeholder}}"
            value="{{$field->default}}"
            class="{{$field->class}}"
    />
    <small class="text-small">{{$field->description}}</small>
</div>
