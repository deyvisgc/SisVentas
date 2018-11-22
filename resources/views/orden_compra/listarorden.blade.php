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
                        <li class="breadcrumb-item active" aria-current="page">Orden de compra</li>
                    </ol>
                </nav>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Reportes de Productos al limite</h4>
                    <div class="row">

                        <div class="col-14">
                            <div class="table-responsive">
                                <table  id="prod" class="table">
                                    <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Codigo</th>
                                        <th>Categoria</th>
                                        <th>Precio</th>
                                        <th>Stock</th>
                                        <th>Estado</th>
                                        <th>Descripcion</th>
                                        <th>Fecha Registro </th>
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
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="https://www.urbanui.com/" target="_blank"></a>. All rights reserved.</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">SYS | VENTAS Version 1.0 <i class="far fa-heart text-danger"></i></span>
            </div>
        </footer>
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
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'pdfHtml5',
                        title: " Lista de los Productos Faltantes",
                        text: 'Descargar en PDF',
                        className: 'btn btn-outline-warning btn-icon-text ',
                        messageTop: 'Pedidos de Productos',

                        exportOptions: {
                            columns: [ 0, 1,2, 3, 4, 5,6,7 ]
                        },
                        customize:function(doc) {
                            doc.styles.title = {
                                fontSize: '20',
                                alignment: 'center'
                            },
                            doc.styles.tableHeader = {
                                bold:!0,
                                fontSize:11,
                                color:'black',
                                fillColor:'#F0F8FF',
                                alignment: "left"
                            }
                        }
                    },
                    {
                        extend: 'print',
                        title: " Lista de los Productos Faltantes",
                        text: 'Imprimir Reporte',
                        className: 'btn btn-outline-success btn-fw',
                        messageTop: 'Pedidos de Productos',

                        exportOptions: {
                            columns: [ 0, 1,2, 3, 4, 5,6,7 ]
                        },
                    }



                ],
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
                    {data: 'descripcion',name:'descripcion'},
                    {data: 'Fecha_Registro',name:'Fecha_Registro'},




                ]


            })


        });
    </script>
    @endsection