<div class="mb-3">
    {{$field['title'] ?? ''}}
    <textarea 
            id="{{$field['id'] ?? $field['key']}}"
            name="{{$field['key']}}"
            placeholder="{{$field['placeholder'] ?? ''}}"
            rows="{{$field['rows'] ?? 3 }}"
            class="{{$field['class'] ?? 'px-2 py-1 rounded-sm border border-gray-200 w-full'}}" 
    >{{$field['default'] ?? ''}}</textarea>
    <small class="text-small">{{$field['description'] ?? ''}}</small>
</div>