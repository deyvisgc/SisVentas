@extends('layouts.header')
@section('contenido')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h2 class="page-title">
                    Listado de Producto<a  data-toggle="modal" data-target="#formProducto"> <span class="btn btn-outline-warning">+ Nuevo</span></a></h2>

                </h2>
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
                                <table id="produc" class="table">
                                    <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Codigo</th>
                                        <th>Categoria</th>
                                        <th>Cantidad</th>
                                        <th>Imagen</th>
                                        <th>Estado</th>
                                        <th size="20px">Fecha Registro</th>
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
    <div class="modal fade modal-slide-in-right" aria-hidden="true"
         role="dialog" tabindex="-1" id="formProducto">
        <div class="modal-dialog" >
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Registrar Producto</h2>
                </div>
                <div class="modal-body">
                    <form id="RegisProdu" enctype="multipart/form-data" action="{{url('Producto')}}" >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nombre Producto</label>
                                    <input type="text" class="form-control" id="nombre_pro" required="Campo Obligatorio" name="nombre_pro" >
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Codigo</label>
                                    <input type="number" class="form-control" id="Codigo" required="Campo Obligatorio"
                                           name="Codigo"  >
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Cantidad</label>
                                    <input type="number" class="form-control" id="cantidad" required="Campo Obligatorio"
                                           name="cantidad"  >
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">descripccion</label>
                                    <input type="text" class="form-control" id="descripccion" required="Campo Obligatorio"  name="descripccion" >
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Estado</label>
                                    <select  class="form-control" id="estado"  name="estado"  >

                                        <option value="Activo">Activo</option>
                                        <option value="Inactivo">Activo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Categoria</label>
                                    <select  class="form-control" id="categoria"  name="categoria" >
                                        @foreach($cate as $cat)
                                        <option value="{{$cat->idcategoria}}">{{$cat->nombre_cate}}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg- col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                <label for="exampleInputEmail1">Fecha Ingreso</label>
                                    <input type="text" name="Fecha_Ingreso"  readonly="readonly" id="fecha_ingre" value="<?php  date_default_timezone_set('America/Lima'); echo date('d:m:y');  echo date('  H:i:s')?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Imagen</label>
                                    <input type="file"  class="form-control" id="imagen" name="imagen" placeholder="Imagen.jpg">
                                </div>
                            </div>

                        </div>



                        <center>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit"  class="btn btn-success" id="inser">Registrar</button>
                            </div>
                        </center>


                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
@section('footer_scripts')

    <script>
        $(document).ready(function () {
            $('#produc').dataTable({

                stateSave: true,
                responsive: true,
                processing: false,
                serverSide : true,
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'excelHtml5',
                        title: "Listado de Mobiliario",
                        exportOptions: {
                            columns: [ 0, 1,2, 3, 4, 5,6,7,8 ]
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        title: "Listado de Mobiliario",
                        exportOptions: {
                            columns: [ 0, 1,2, 3, 4, 5,6,7,8 ]
                        }

                    },
                    {
                        extend: 'print',
                        title: "Listado de Mobiliario",
                        exportOptions: {
                            columns: [ 0, 1,2, 3, 4, 5,6,7,8 ]
                        }

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
                ajax: '{{url('Producto')}}',

                columns: [
                    {data: 'nombre_pro', name:'nombre_pro'},
                    {data: 'codigo', name:'codigo'},
                    {data: 'nombre_cate',name:'nombre_cate'},
                    {data: 'cantidad', name:'cantidad'},
                    {data: 'imagen', name: 'imagen', orderable: true, searchable: true},
                {data: 'estado',name:'estado'},
                    {data: 'Fecha_Registro',name:'Fecha_Registro'},

                    {data: 'action', name: 'action', orderable: false, searchable: false}


                ]


            });

        })


$('#inser').click(function (e) {
    e.preventDefault();
    var formData = new FormData(document.getElementById("RegisProdu"));
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url:'{{url('Producto')}}',
        dataType:'json',
        type:'post',
        data:formData,
        cache: false,
        contentType: false,
        processData: false,
        success:function (response) {
            swal({
                position: 'center',
                type: 'success',
                title: 'Registro Exitoso',
                showConfirmButton: false,
                timer: 1500
            });
            $('#formProducto').modal('hide');
        },
        error: function(){
            alert("error in ajax form submission");
        }

    });
    setTimeout(window.location.reload.bind(window.location), 1000);
    return false;

})

    </script>
    @endsection