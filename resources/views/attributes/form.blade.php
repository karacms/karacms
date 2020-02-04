<form id="{{$form->id}}" name="{{$form->name}}" method="{{$form->method}}" action="{{$form->action}}" class="{{$form->class}}" {!! $form->attributes !!}>
    @if (isset($form->data->id))
        @method('PUT')
    @endif

    @csrf

    {!! $form->renderFields() !!}
</form>