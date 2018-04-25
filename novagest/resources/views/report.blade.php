@extends('layout.dashboard')

@section('content')
<div class="row">
{{ Form::open(array('url' => 'report/send/', 'id'=>'form')) }}
    <div class="col s12">
      <div class="row">
        <div class="input-field col s12">
          <textarea id="textarea1" class="materialize-textarea"></textarea>
          <label for="textarea1">Contactez nous!</label>
        </div>
      </div>
    </div>
    {{ Form::submit('Envoyer', array('class' => 'waves-effect waves-light btn')) }}
    {{ Form::close() }}
  </div>
@stop