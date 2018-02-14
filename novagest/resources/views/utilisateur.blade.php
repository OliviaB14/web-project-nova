<div class="modal-body">
              {{ Form::open(array('url' => 'utilisateur/add')) }}
              <div>
              <div class="form-group pull">
                {{ Form::submit('Ajouter', array('class' => 'btn-sm btn-success')) }}
              </div>
            {{ Form::close() }}
          </div>