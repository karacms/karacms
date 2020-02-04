<div class="mb-3">
    <label>{{$field->title}}</label>
    <input type="text" 
            name="{{$field->key}}"
            placeholder="{{$field->placeholder}}" 
            value="{{$field->default}}" 
            class="{{$field->class ?? 'px-2 py-1 rounded-sm border border-gray-200 w-full'}}" 
    />
    <small class="text-small">{{$field->description ?? ''}}</small>
</div>