<div class="mb-3">
    <label>{{$field->title}}</label>
    <input type="datetime-local" 
            name="{{$field->key}}"
            placeholder="{{$field->placeholder}}" 
            value="{{$field->default}}" 
            class="{{$field->class}}" 
    />
    <small class="text-small">{{$field->description}}</small>
</div>