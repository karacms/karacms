<div class="mb-3">
    {{$field->title}}
    <input type="tel" 
            name="{{$field->key}}"
            placeholder="{{$field->placeholder}}" 
            value="{{$field->default}}" 
            class="{{$field->class}}" 
    />
    <small class="text-small">{{$field->description ?? ''}}</small>
</div>