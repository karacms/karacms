<div class="mb-3">
    <label>{{$field['title']}}</label>
    <div id="{{$field['key']}}"></div>
    <input type="hidden" name="{{$field['key']}}" :value="JSON.stringify(holders.{{$field['key']}})" />
</div>

@push('scripts')
<script>
    holders.{{$field['key']}} = {!!$field['default']!!};
</script>
@endpush