<div class="mb-3">
    {{$field['title'] ?? ''}}
    <input type="range" 
            id="{{$field['id'] ?? $field['key']}}"
            name="{{$field['key']}}"
            placeholder="{{$field['placeholder'] ?? ''}}" 
            value="{{$field['default'] ?? ''}}" 
            min="{{$field['min']}}"
            max="{{$field['max']}}"
            class="{{$field['class'] ?? 'px-2 py-1 rounded-sm border border-gray-200 w-full'}}" 
    />
    <small class="text-small">{{$field['description'] ?? ''}}</small>
</div>