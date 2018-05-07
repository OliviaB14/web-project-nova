@extends('layout.dashboard')

@section('content')
<div class="row">
{{ Form::open(array('url' => 'sendbasicemail', 'id'=>'form')) }}
    <div class="col s12">
      <div class="row">
        <div class="input-field col s12">
        {{ Form::label('text', 'Contactez nous!')}}
        {{ Form::text('text', null,array('class'=>'materialize-textarea', 'required' => 'required'))}}
        </div>
      </div>
    </div>
    {{ Form::submit('Envoyer', array('class' => 'waves-effect waves-light btn')) }}
    {{ Form::close() }}
  </div>
@stop