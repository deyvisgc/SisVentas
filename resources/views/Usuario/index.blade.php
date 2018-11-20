@extends('layouts.header')
@section('contenido')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Listado de Usuarios<a  data-toggle="modal" data-target="#modal-Regis"> <span class="btn btn-outline-success">+ Nuevo</span></a></h3>

            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Tables</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data table</li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data table</h4>
                <div class="row">
                    <div class="col-14">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>telefono</th>
                                <th>DNI</th>
                                <th>Email</th>
                                <th>Cumpleaños</th>
                                <th>usuario</th>
                                <th>Rol</th>
                                <th>imagen</th>
                                <th>Opciones</th>
                                </thead>
                                <tr>
                                @foreach ($user as $use)
                                    <tr>
                                        <td>{{$use->nombre}}</td>
                                        <td>{{$use->Apellido_Pater.' '.$use->Apellido_Mater}}</td>
                                        <td>{{$use->telefono}}</td>
                                        <td>{{$use->dni}}</td>
                                        <td>{{$use->email}}</td>
                                        <td>{{$use->Fecha_nacimiento}}</td>
                                        <td>{{$use->username}}</td>
                                        <td>{{$use->nombre_rol}}</td>
                                        <td> <img src="{{asset('Imagenes/Usuario/'.$use->imagen)}}" alt="{{ $use->nombre}}" height="60px" width="60px" class="img-thumbnail">

                                        <td>
                                            <a href="" data-target="#modal-editPersona-{{$use->idPersona}}"  data-toggle="modal"> <button  class="btn btn-info" style="size: 10px" >
                                                    <i class="fa fa-edit"  aria-hidden="true"></i></button></a>
                                            <a href="" data-target="#modal-delete-{{$use->id}}" data-toggle="modal"><button style="size: 5px "  class="btn btn-danger"><i class="fa fa-trash"  aria-hidden="true"></i>
                                                </button></a> </td>

                                        </center>
                                    </tr>

                                    @include('Usuario.eliminar')
                                    @include('Usuario.update')
                                @endforeach

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-slide-in-right" aria-hidden="true"
     role="dialog" tabindex="-1" id="modal-Regis">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Registrar  Usuario</h1>
            </div>
            {!! Form::open(array('url'=>'User/create','method'=>'Post','autocomplete'=>'off','files'=>true)) !!}
            {{Form::token()}}
            <div class="modal-body">
                <div class="row">

                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nombre</label>
                            <input value="{{old('nombre')}}" name="nombre" required="Campo Obligatorio"   type="text" class="form-control" placeholder="nombre">
                            <p class="errorName text-danger hidden"></p>
                        </div>
                    </div>

                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Apellido Paterno</label>
                            <input value="{{old('apellido_pa')}}"  name="apellido_pa" required="Campo Obligatorio" type="text"  class="form-control" placeholder="Apellido Paterno">
                            <p class="errorApe text-danger hidden"></p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Apellido Materno</label>
                            <input  value="{{old('apellido_ma')}}" name="apellido_ma" required="Campo Obligatorio" type="text" class="form-control" placeholder="Apellido Materno">
                            <p class="errorAPm text-danger hidden"></p>
                        </div>
                    </div>

                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Telefono</label>
                            <input name="telefono" type="number" required="Campo Obligatorio" value="{{old('telefono')}}" class="form-control">
                            <p class="errorTele text-danger hidden"></p>
                        </div>
                    </div>

                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">EMAIL</label>
                            <input value="{{old('email')}}" name="email" required="Campo Obligatorio"  type="email" placeholder="example@gmail.com"  class="form-control">
                            <p class="errorCorr text-danger hidden"></p>
                        </div>
                    </div>

                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label">Usuario</label>
                            <div>
                                <input value="{{old('username')}}"  name="username" required="Campo Obligatorio"  type="text" class="form-control" placeholder="usuario">
                                <p class="errorUser text-danger hidden"></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">N°DNI</label>
                            <input value="{{old('dni')}}" name="dni" required="Campo Obligatorio"  type="number" class="form-control" placeholder="DNI">
                            <p class="errorDni text-danger hidden"></p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Rol</label>
                            <select name="rol" class="form-control" onreset="" >
                                <option value="" >Seleccione tu Rol</option>
                                @foreach($rol as $ro)
                                    <option value="{{$ro->idroles}}">{{$ro->nombre_rol}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Direccion</label>
                            <input value="{{old('direccion')}}" required="Campo Obligatorio" placeholder="direccion"  name="direccion" type="text" class="form-control">
                            <p class="errorDire text-danger hidden"></p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>

                            <input name="password" value="{{old('password')}}" required="Campo Obligatorio"  type="password" class="form-control" placeholder="*******">
                            <p class="errorPas text-danger hidden"></p>
                        </div>
                    </div>

                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Imagen</label>
                            <input type="file"  class="form-control" id="imagen" name="imagen" placeholder="Imagen.jpg">
                            <p class="errorIma text-danger hidden"></p>

                        </div>
                    </div>

                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <label for="exampleInputEmail1">Fecha Nacimiento</label>
                        <div class="input-group date"  data-provide="datepicker">
                            <input type="text" value="{{old("Fecha_cumple")}}" name="Fecha_cumple" placeholder="Fecha Nacimiento" id="date" class="form-control">
                            <p class="errorFecha text-danger hidden"></p>
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>


                    </div>

                </div>
                <center>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="submit"  class="btn btn-success" id="editar">Registrar</button>
                    </div>
                </center>


            </div>
            {!! Form::close() !!}

        </div>
    </div>
</div>
    @endsection