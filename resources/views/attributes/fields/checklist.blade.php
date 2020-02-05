<div class="mb-3 field-checklist">
    <label>{{$field->title}}</label>
    <input type="hidden" name="{{$field->key}}" value="" />
    <ul>
    @foreach ($field->options as $key => $value)
    <li>
        <label>
            <input type="checkbox" name="{{$field->key}}[]" value="{{$key}}" {{is_array($field->default) && in_array($key, $field->default) ? 'checked' : '' }} /> 
            {{$value}}
        </label>
    </li>
    @endforeach
    </ul>
</div>