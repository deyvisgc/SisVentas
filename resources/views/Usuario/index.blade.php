@extends('layouts.header')
@section('contenido')
    <style type="text/css">
        body {
            font-family: 'Varela Round', sans-serif;
        }
        .modal-confirm {
            color: #636363;
            width: 400px;
        }
        .modal-confirm .modal-content {
            padding: 20px;
            border-radius: 5px;
            border: none;
            text-align: center;
            font-size: 14px;
        }
        .modal-confirm .modal-header {
            border-bottom: none;
            position: relative;
        }
        .modal-confirm h4 {
            text-align: center;
            font-size: 26px;
            margin: 30px 0 -10px;
        }
        .modal-confirm .close {
            position: absolute;
            top: -5px;
            right: -2px;
        }
        .modal-confirm .modal-body {
            color: #999;
        }
        .modal-confirm .modal-footer {
            border: none;
            text-align: center;
            border-radius: 5px;
            font-size: 13px;
            padding: 10px 15px 25px;
        }
        .modal-confirm .modal-footer a {
            color: #999;
        }
        .modal-confirm .icon-box {
            width: 80px;
            height: 80px;
            margin: 0 auto;
            border-radius: 50%;
            z-index: 9;
            text-align: center;
            border: 3px solid #f15e5e;
        }
        .modal-confirm .icon-box i {
            color: #f15e5e;
            font-size: 46px;
            display: inline-block;
            margin-top: 13px;
        }
        .modal-confirm .btn {
            color: #fff;
            border-radius: 4px;
            background: #60c7c1;
            text-decoration: none;
            transition: all 0.4s;
            line-height: normal;
            min-width: 120px;
            border: none;
            min-height: 40px;
            border-radius: 3px;
            margin: 0 5px;
            outline: none !important;
        }
        .modal-confirm .btn-info {
            background: #c1c1c1;
        }
        .modal-confirm .btn-info:hover, .modal-confirm .btn-info:focus {
            background: #a8a8a8;
        }
        .modal-confirm .btn-danger {
            background: #f15e5e;
        }
        .modal-confirm .btn-danger:hover, .modal-confirm .btn-danger:focus {
            background: #ee3535;
        }
        .trigger-btn {
            display: inline-block;
            margin: 100px auto;
        }
    </style>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Listado de Usuarios<a  data-toggle="modal" data-target="#modal-Regis"> <span class="btn btn-outline-success">+ Nuevo</span></a></h3>

            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"></h4>
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
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="https://www.urbanui.com/" target="_blank"></a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">SYS | VENTAS Version 1.0 <i class="far fa-heart text-danger"></i></span>
        </div>
    </footer>
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
                            <input name="telefono" onkeypress="return controltag(event)" maxlength="9"   required="Campo Obligatorio" value="{{old('telefono')}}" class="form-control">
                            <p class="errorTele text-danger hidden"></p>
                        </div>
                    </div>

                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">EMAIL</label>
                            <input value="{{old('email')}}"   name="email" required="Campo Obligatorio"  type="email" placeholder="example@gmail.com"  class="form-control">
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
                            <input value="{{old('dni')}}" name="dni" required="Campo Obligatorio" onkeypress="return controltag(event)" maxlength="8"  type="text" class="form-control" placeholder="DNI">
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

@section('footer_scripts')
    <script>
        function controltag(e) {
            tecla = (document.all) ? e.keyCode : e.which;
            if (tecla==8) return true; // para la tecla de retroseso
            else if (tecla==0||tecla==9)  return true; //<-- PARA EL TABULADOR-> su keyCode es 9 pero en tecla se esta transformando a 0 asi que porsiacaso los dos
            patron =/[0-9\s]/;// -> solo numeros
            te = String.fromCharCode(tecla);
            return patron.test(te);
        }
    </script>
    @endsection