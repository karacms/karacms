<div class="mb-3">
    <label>{{$field->title}}</label>
    <quill-editor v-model="richTexts.{{$field->key}}" :options="{placeholder: '{{$field->placeholder}}'}" class="{{$field->class}}"></quill-editor>

    <input :value="richTexts.{{$field->key}}" type="hidden" name="{{$field->key}}" />
</div>

@push('inline-scripts')
    richTexts.{{$field->key}} = `{!!$field->default!!}`;
@endpush
