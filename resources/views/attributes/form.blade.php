<form id="{{$form->id}}" name="{{$form->name}}" method="{{$form->method}}" action="{{$form->action}}" class="{{$form->class}}" @submit.prevent="saveContent()">
    @if (isset($form->data->id))
        @method('PUT')
    @endif

    @csrf

    {!! $form->renderFields() !!}
</form>