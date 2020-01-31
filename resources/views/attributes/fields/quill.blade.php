<div class="mb-3">
    <label>{{$field['title'] ?? ''}}</label>
    <quill-editor v-model="richTexts.{{$field['key']}}" :options="{placeholder: '{{$field['placeholder'] ?? null}}'}" style="height: {{$field['height'] ?? '200px'}}"></quill-editor>

    <input :value="richTexts.{{$field['key']}}" type="hidden" name="{{$field['key']}}" />
</div>

@push('scripts')
<script>
    richTexts.{{$field['key']}} = `{!!$field['default']!!}`;
</script>
@endpush