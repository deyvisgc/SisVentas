@extends('layouts.header')
@section('contenido')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h2 class="page-title">
                   Productos  bajo limite

                </h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">
                                Home
                            </a></li>
                        <li class="breadcrumb-item active" aria-current="page">Almacen</li>
                    </ol>
                </nav>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"></h4>
                    <div class="row">
                        <div class="col-14">
                            <div class="table-responsive">
                                <table  id="prod" class="table">
                                    <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Codigo</th>
                                        <th>Categoria</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
                                        <th>Stock</th>
                                        <th>Estado</th>
                                        <th>Fecha Registro </th>
                                        <th>Opciones</th>
                                    </thead>
                                    </tr>

                                    </thead>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer_scripts')
    <script>
        var table;
        $(document).ready(function () {
            table =  $('#prod').dataTable({
                stateSave: true,
                responsive: true,
                processing: false,
                serverSide : true,
                language: {


                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningun  producto bajo el limite",
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
                    },



                },
                ajax: '{{url('oden_compra')}}',

                columns: [
                    {data: 'nombre_pro', name:'nombre_pro'},
                    {data: 'codigo', name:'codigo'},
                    {data: 'nombre_cate',name:'nombre_cate'},
                    {data: 'cantidad', name:'cantidad'},
                    {data: 'Precio_Pro', name:'Precio_Pro'},
                    {data: 'stock', name:'stock'},
                    {data: 'estado',name:'estado',
                        "render":function (data,type,row) {
                            if(row.estado==='producto activado'){
                                return ' <label class="badge badge-outline-success badge-pill">producto activado</label>';
                            }else if (row.estado==='producto desactivado'){
                                return ' <label class="badge badge-outline-danger badge-pill">productos Agotados</label>';
                            }

                        }
                    },
                    {data: 'Fecha_Registro',name:'Fecha_Registro'},
                    {data: null,
                        render: function ( data, type, row ) {
                            return ' <center>   <button title="ficha médica"  data-toggle="modal" data-target="#AlmaForm" data-cache="false"' +
                                '  onclick=editarAlm('+row.idalmacen+') type="button" class="btn btn-outline-warning btn-rounded btn-icon">\n' +
                                '                          <i class="fas fa-user-edit"></i></button></center>';
                        }}




                ]


            })


        });
    </script>
    @endsection