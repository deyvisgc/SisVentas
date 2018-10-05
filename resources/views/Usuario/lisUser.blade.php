@extends('layouts.admin')
@section('contenido')

        <div class="container-fluid">
            <h3>Listado de Departamento <a data-toggle="modal" id="add_data"><button class="btn btn-success">Nuevo</button></a></h3>

            <div class="table-responsive">
                <table class="table table-striped" id="users-table">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>APELLIDO</th>
                        <th>matrno</th>
                        <th>DNI</th>
                        <th>FECHA</th>
                        <th>DIRECCION</th>
                        <th>TELEFONO</th>
                        <th>ROL</th>
                        <th>USUARIO</th>
                        <th>CORREO</th>
                        <th>EDAD</th>
                        <th>Operaciones</th>
                    </tr>
                    </thead>
                    <tr>
                        @foreach($user as $use)
                            <th>{{$use->nombre}}</th>
                            @endforeach

                    </tr>

                </table>
            </div>
        </div>

    </div>
@endsection
@section('footer_scripts')

    <script>
        $('#users-table').dataTable({
            stateSave: true,
            responsive: true,
            processing: true,
            serverSide : true,
            language: {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Ningún dato disponible en esta tabla",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            },
            ajax:'{!! route('listar') !!}',

            columns: [
                {data:'idPersona',name:'p.idPersona'},
                {data:'nombre', name:'p.nombre'},
                {data:'Apellido_Pater' , name:'p.Apellido_Pater'},
                {data:'Apellido_Mater', name:'p.Apellido_Mater'},
                {data:'dni',name:'p.dni'},
                {data: 'Fecha_nacimiento',name:'p.Fecha_nacimiento'},
                {data:'Direccion',name:'p.Direccion'},
                {data:'telefono', name:'p.telefono'},
                {data:'nombre_rol',name:'r.nombre_rol'},
                {data:'username',name:'us.username'},
                {data:'email' ,name:'us.email'},
                {data:'edad',name:'p.edad'},
                { "defaultContent": "<a href='{{url('update')}}'<button type='button' class='selec btn btn-primary '>Editar</button></a>" +
                "<a href=''<button type='button' class='selec btn btn-danger '>Eliminar</button></a>"

                     ,
                    "className": "text-center"}



            ]


        });

    </script>

@endsection