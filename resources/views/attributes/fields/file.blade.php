<div class="mb-3">
    {{$field['title'] ?? ''}}
    <input type="file" 
            name="{{$field['key']}}"
            placeholder="{{$field['placeholder'] ?? ''}}" 
            class="{{$field['class'] ?? 'px-2 py-1 rounded-sm border border-gray-200 w-full'}}" 
    />
    <small class="text-small">{{$field['description'] ?? ''}}</small>
</div>