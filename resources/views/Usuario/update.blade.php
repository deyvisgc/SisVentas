<div class="modal fade modal-slide-in-right" aria-hidden="true"
     role="dialog" tabindex="-1" id="modal-editPersona-{{$use->idPersona}}">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Detalle  Usuario</h1>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nombre</label>
                            <input type="text" class="form-control" disabled id="nombre" required="Campo Obligatorio" value="{{$use->nombre}}" name="nombre"  >
                        </div>
                    </div>

                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Apellido Paterno</label>
                            <input type="text" class="form-control" disabled id="apellido_pa" required="Campo Obligatorio"
                                   value="{{$use->Apellido_Pater}}" name="apellido_pa"  placeholder="Apellido Paterno">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Apellido Materno</label>
                            <input type="text" class="form-control" disabled id="apellido_ma" required="Campo Obligatorio"
                                   value="{{$use->Apellido_Mater}}"  name="apellido_ma" placeholder="Apellido Materno" >
                        </div>
                    </div>

                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Telefono</label>
                            <input type="number" disabled class="form-control" id="telefono" required="Campo Obligatorio" value="{{$use->telefono}}" name="telefono"  placeholder="Telefono">
                        </div>
                    </div>

                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">EMAIL</label>
                            <input type="email" class="form-control" id="email" required="Campo Obligatorio" value="{{$use->email}}" disabled= name="email" disabled=""  placeholder="Example@gmail.com">
                        </div>
                    </div>

                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label">Usuario</label>
                            <div>
                                <input type="text" disabled= required class="form-control " value="{{$use->username}}" placeholder="username" name="username">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">N°DNI</label>
                            <input type="number"  class="form-control" id="dni" disabled required="Campo Obligatorio" value="{{$use->dni}}" name="dni"  placeholder="DNI">
                        </div>
                    </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

                         <div class="form-group">
                              <label for="exampleInputEmail1">Rol</label>
                             <input type="text" disabled= required class="form-control " value="{{$use->nombre_rol}}" >
                         </div>
                        </div>

                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Imagen</label>
                            <input type="file" disabled class="form-control" id="imagen" name="imagen" placeholder="Imagen.jpg">
                                <img src="{{asset('Imagenes/Usuario/'.$use->imagen)}}" height="100px" width="100px" class="img-thumbnail">

                        </div>
                    </div>

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <label for="exampleInputEmail1">Fecha Cumpleaños</label>
                    <div class="input-group date"  data-provide="datepicker">
                        <input type="text" name="Fecha_cumple" disabled  required="Campo Obligatorio" value="{{$use->Fecha_nacimiento}}" id="date" class="form-control">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>


                </div>
                </div>
                <center>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

                    </div>
                </center>


            </div>
        </div>
    </div>
</div>
