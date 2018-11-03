@extends('layouts.header')
@section('contenido')


    <div class="row" style="margin-left: auto">
        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
            <center><h3>LISTADO DE USUARIOS</h3></center>
            @include('Usuario.searcRes')
        </div>
    </div>
    <div class="row" style="margin-left: 10px">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
            {{$user->render()}}

        </div>
    </div>




@endsection
