<div class="mb-3 field-type-password field-wrapper">
    <label>{{$field->title}}</label>
    <input type="password" 
            name="{{$field->key}}"
            placeholder="{{$field->placeholder}}" 
            value="{{$field->default}}" 
            class="{{$field->class}}" 
    />
    <small class="text-small">{{$field->description}}</small>
</div>