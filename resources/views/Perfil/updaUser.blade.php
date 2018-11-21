<div id="modal-update-{{$user->id}}" class="modal fade" role="dialog" >
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            {{Form::Open(array('action'=>array('PerfilController@updateUser',$user->id),'method'=>'patch'))}}
            {{Form::token()}}
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>Editar Usuarios</h3>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="name">Correo</label>
                            <input type="text" name="email"  value="{{$user->email}}" class="form-control" placeholder="Rol..">
                    </div>
                    </div>

                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="name">Usuario</label>
                            <input type="text" name="username"  value="{{$user->username}}" class="form-control" placeholder="Rol..">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-success" id="submit">
                    </div>


                    {!!Form::close()!!}

                </div>
            </div>

        </div>
    </div>
</div>