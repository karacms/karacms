<div class="mb-3 field-type-radio field-wrapper">
    <label>{{$field->title}}</label>

    <div class="radio-group mt-2">
        <ul>
        @foreach ($field->options as $value => $label)
            <li class="mt-1">
                <label>
                    <input type="radio" name="{{$field->key}}" id="{{$field->id}}" value="{{$value}}" {{$field->default === $value ? 'checked' : ''}}> {{$label}}
                </label>
            </li>
        @endforeach
        </ul>
    </div>

    <div class="field-description">{{$field->description}}</div>
</div>