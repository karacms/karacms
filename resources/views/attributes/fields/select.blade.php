<div class="mb-3">
    <label>{{$field->title}}</label>
    <select name="{{$field->key}}{{$field->multiple ? '[]' : ''}}" id="{{$field->id}}" class="{{$field->class}}" {{$field->multiple ? 'multiple' : ''}}>
        @foreach ($field->options as $value => $label)
        <option value="{{$value}}" 
            {{!is_array($field->default) && $field->default === $value ? 'selected' : ''}} 
            {{is_array($field->default) && in_array($value, $field->default) ? 'selected' : '' }}>
            {{$label}}
        </option>
        @endforeach
    </select>
</div>