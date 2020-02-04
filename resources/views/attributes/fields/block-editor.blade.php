<div class="mb-3">
    <label>{{$field->title}}</label>

    <div class="rounded p-8 shadow">
        <div id="{{$field->key}}"></div>
        <input type="hidden" name="{{$field->key}}" />
    </div>
</div>

@push('scripts')
<script>
    @if (is_object(json_decode($field->default)))
        holders.{{$field->key}} = {!! $field->default !!};
    @else
        holders.{{$field->key}} = {};
    @endif
</script>
@endpush