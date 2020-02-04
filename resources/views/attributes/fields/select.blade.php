<div class="mb-3">
    <label>{{$field->title}}</label>

    <select name="{{$field->key}}" id="{{$field->id}}" class="{{$field->class}}">
        @foreach ($field->options as $value => $label)
        <option value="{{$value}}" {{$field->default === $value ? 'selected' : ''}}>{{$label}}</option>
        @endforeach
    </select>
</div>