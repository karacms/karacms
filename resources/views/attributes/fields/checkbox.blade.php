<div class="mb-3 field-type-checkbox field-wrapper">
    <label>
        <input type="hidden" name="{{$field->key}}" value="" />
        <input type="checkbox" name="{{$field->key}}" id="{{$field->id}}" value="1" {{$field->default != null && $field->default != false ? 'checked' : ''}}  /> {{$field->title}}
    </label>
</div>
