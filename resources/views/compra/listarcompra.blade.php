@extends('layouts.header')
@section('contenido')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h2 class="page-title">
                   Compras de productos existentes

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
                                        <th>Total</th>
                                        <th>fecha Registro</th>
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
        table =  $('#Compra').dataTable({
            stateSave: true,
            responsive: true,
            processing: false,
            serverSide : true,
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'pdfHtml5',
                    title: "Reportes de Compras Realizadas",
                    text: 'Descargar en PDF',
                    className: 'btn btn-outline-warning btn-icon-text ',
                    messageTop: 'Compras de Productos',

                    exportOptions: {
                        columns: [ 0, 1,2]
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
                    title: "Reportes de Compras Realizadas",
                    text: 'Imprimir Reporte',
                    className: 'btn btn-outline-success btn-fw',
                    messageTop: 'Compras de Productos',

                    exportOptions: {
                        columns: [ 0, 1,2]
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
            ajax: '{{url('ListarComprasExis')}}',

            columns: [
                {data: 'fullname', name:'fullname'},
                {data: 'precio_compra',name:'precio_compra'},
                {data: 'fecha_comp',name:'fecha_comp'},

            ]


        })


    });
</script>


    @endsection