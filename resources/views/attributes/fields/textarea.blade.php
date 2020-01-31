<div class="mb-3">
    {{$field['title'] ?? ''}}
    <textarea 
            placeholder="{{$field['placeholder'] ?? ''}}" 
            value="{{$field['default'] ?? ''}}" 
            class="{{$field['class'] ?? 'px-2 py-1 rounded-sm border border-gray-200 w-full'}}"
            rows="{{$field['rows'] ?? 3}}"
    ></textarea>
    <small class="text-small">{{$field['description'] ?? ''}}</small>
</div>