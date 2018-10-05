<div class="modal fade modal-slide-in-right" aria-hidden="true"
     role="dialog" tabindex="-1" id="modal-editPersona-{{$user->idPersona}}">
    {{Form::Open(array('action'=>array('PerfilController@updatePersona',$user->idPersona),'method'=>'patch','files'=>true))}}

    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Actualizar Usuario</h1>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nombre</label>
                            <input type="text" class="form-control" id="nombre" required="Campo Obligatorio" value="{{$user->nombre}}" name="nombre"  >
                        </div>
                    </div>

                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Apellido Paterno</label>
                            <input type="text" class="form-control" id="apellido_pa" required="Campo Obligatorio"
                                   value="{{$user->Apellido_Pater}}" name="apellido_pa"  placeholder="Apellido Paterno">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Apellido Materno</label>
                            <input type="text" class="form-control" id="apellido_ma" required="Campo Obligatorio"
                                   value="{{$user->Apellido_Mater}}"  name="apellido_ma" placeholder="Apellido Materno" >
                        </div>
                    </div>

                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Telefono</label>
                            <input type="number" class="form-control" id="telefono" required="Campo Obligatorio" value="{{$user->telefono}}" name="telefono"  placeholder="Telefono">
                        </div>
                    </div>

                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">N°DNI</label>
                            <input type="number" class="form-control" id="dni" required="Campo Obligatorio" value="{{$user->dni}}" name="dni"  placeholder="DNI">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Edad</label>
                            <input type="number" class="form-control" id="edad" required="Campo Obligatorio" value="{{$user->edad}}" name="edad"  placeholder="">
                        </div>
                    </div>

                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Direccion</label>
                            <input type="text" class="form-control" id="direccion" required="Campo Obligatorio" value="{{$user->Direccion}}" name="direccion"  placeholder="">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Rol</label>
                            <select name="rol" class="form-control" >
                                @foreach($rol as $ro)
                                    <option value="{{$ro->idroles}}">{{$ro->nombre_rol}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Imagen</label>
                            <input type="file" class="form-control" id="imagen" name="imagen" placeholder="Image.jp">
                            @if(($user->imagen)!="")
                                <img src="{{asset('Imagenes/Usuario/'.$user->imagen)}}" height="100px" width="100px" class="img-thumbnail">
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <label for="exampleInputEmail1">Fecha Cumpleaños</label>
                        <div class="input-group date"  data-provide="datepicker">
                            <input type="text" name="Fecha_cumple"  required="Campo Obligatorio" value="{{$user->Fecha_nacimiento}}" id="date" class="form-control">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>


                    </div>
                </div>
                <center>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-success" id="submit">
                    </div>
                </center>


            </div>
        </div>
    </div>
    </div>

{!!Form::close()!!}