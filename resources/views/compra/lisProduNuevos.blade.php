@extends('layouts.header')
@section('contenido')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h2 class="page-title">
                    Compras de productos Nuevos

                </h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">
                                Home
                            </a></li>
                        <li class="breadcrumb-item active" aria-current="page">Compras</li>
                    </ol>
                </nav>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Reportes de Compras</h4>
                    <div class="row">

                        <div class="col-14">
                            <div class="table-responsive">
                                <table  id="Compra" class="table">
                                    <thead>
                                    <tr>
                                        <th>Provedor</th>
                                        <th>Nombre Producto</th>
                                        <th>Codigo</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
                                        <th>Fecha Registro</th>
                                        <th>Categoria</th>
                                        <th>Total</th>
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
            table =  $('#Compra').dataTable({
                stateSave: true,
                responsive: true,
                processing: false,
                serverSide : true,
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'pdfHtml5',
                        title: "Reportes de Compras",
                        text: 'Descargar en PDF',
                        className: 'btn btn-outline-info btn-icon-text ',
                        messageTop: 'Reportes de Compras de Productos nuevos',

                        exportOptions: {
                            columns: [ 0, 1,2,3,4,5,6,7]
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
                        title: "Reportes de Compras",
                        text: 'Imprimir Reporte',
                        className: 'btn btn-outline-warning btn-fw',
                        messageTop: 'Reportes de Compras de Productos nuevos',

                        exportOptions: {
                            columns: [0, 1,2,3,4,5,6,7]
                        },
                    }



                ],
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
                    },



                },
                ajax: '{{url('ListarComprasNuevas')}}',

                columns: [
                    {data: 'fullname', name:'fullname'},
                    {data: 'nombre_pro',name:'nombre_pro'},
                    {data: 'codigo',name:'codigo'},
                    {data: 'stock', name:'stock'},
                    {data: 'Precio_Pro',name:'Precio_Pro'},
                    {data: 'fecha_comp',name:'fecha_comp'},
                    {data: 'nombre_cate', name:'nombre_cate'},
                    {data: 'precio_compra',name:'precio_compra'},


                ]


            })


        });
    </script>


@endsection