<div class="mb-3">
    <label>
        <input type="color" 
            name="{{$field->key}}"
            value="{{$field->default}}" 
            class="{{$field->class}}" 
        /> {{$field->title}}
    </label>
    
    <small class="text-small">{{$field->description}}</small>
</div>