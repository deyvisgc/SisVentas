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
                                <table  id="users-table" class="table">
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
    <!--modal registrar-->
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
                                        @foreach($cate as $ca)
                                            <option value="{{$ca->idcategoria}}">{{$ca->nombre_cate}}</option>
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

    <!--modal editar-->

    <div class="modal fade modal-slide-in-right" aria-hidden="true"
         role="dialog" tabindex="-1" id="formEdir">
        <div class="modal-dialog" >
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Editar Producto</h2>
                </div>
                <div class="modal-body">
                    <form id="EditProdu" enctype="multipart/form-data" method="post"  >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nombre Producto</label>
                                    <input type="text" class="form-control" id="nombre" required="Campo Obligatorio" name="nombre_pro" >

                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Codigo</label>
                                    <input type="number" class="form-control" id="Codigo_pro" required="Campo Obligatorio"
                                           name="Codigo"  >
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Cantidad</label>
                                    <input type="number" class="form-control" id="cantidad_pro" required="Campo Obligatorio"
                                           name="cantidad"  >
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">descripccion</label>
                                    <input type="text" class="form-control" id="descripccion_pro" required="Campo Obligatorio"  name="descripccion" >
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Estado</label>
                                    <input disabled class="form-control" id="estado_pro"  name="estado"  >



                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Categoria</label>
                                    <select  class="form-control" id="cate"  name="categoria" >

                                    </select>
                                </div>
                            </div>
                            <div class="col-lg- col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Fecha Ingreso</label>
                                    <div class="input-group date"  data-provide="datepicker">
                                        <input type="text" name="Fecha_Ingreso"  required="Campo Obligatorio" id="fecha_ingre_pro" class="form-control">
                                        <div class="input-group-addon">
                                             <span class="input-group-addon input-group-append border-left">
                                             <span class="far fa-calendar input-group-text"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Imagen</label>

                                    <input type="file"  class="form-control" id="imagen_pro" name="imagen" placeholder="Imagen.jpg">
                                </div>
                            </div>

                        </div>



                        <center>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit"  class="btn btn-success" id="editar">Registrar</button>
                            </div>
                        </center>


                    </form>

                </div>
            </div>
        </div>
    </div>
    <div id="deletPro" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">

                <div class="modal-header">
                    <div class="icon-box">
                        <i class="fa fa-trash"></i>
                    </div>
                    <h4 class="modal-title">Estas seguro?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <p>¿Realmente quieres borrar estos registro? Este proceso no se puede deshacer.</p>
                </div>
                <div class="modal-footer">
                    <button type="button"   class="btn btn-info" data-dismiss="modal">Cancel</button>
                    <button type="button"  id="dele" class="btn btn-danger" >Eliminar</button>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('footer_scripts')

    <script>
        var table;
        $(document).ready(function () {
            table =   $('#users-table').dataTable({
                stateSave: true,
                responsive: true,
                processing: false,
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


            })

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

});
       function editarPro(idproducto) {
           if (idproducto){
               $.ajax({
                   url:'{{url('edit/Produ')}}/'+idproducto,
                   type:'get',
                   dataType: 'json',
                   success:function (response) {
                       if (response.prod) {
                           $('#nombre').val(response.prod.nombre_pro);
                           $('#Codigo_pro').val(response.prod.codigo);
                           $('#cantidad_pro').val(response.prod.cantidad);
                           $('#descripccion_pro').val(response.prod.descripcion);
                           $('#estado_pro').val(response.prod.estado);
                           $('#fecha_ingre_pro').val(response.prod.Fecha_Registro);

                           $.each(response.categoria, function (index, val) {
                               if (val.idcategoria === response.prod.idcategoria) {
                                   $('#cate').append('<option selected   value="' + val.idcategoria + '">' + val.nombre_cate + '</option>');
                               } else {
                                   $('#cate').append('<option    value="' + val.idcategoria + '">' + val.nombre_cate + '</option>');
                               }

                           });
                           $('#editar').click(function (event) {
                               $.ajaxSetup({
                                   headers: {
                                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                   }
                               });
                               event.preventDefault();
                               var form=$('#EditProdu');
                        $.ajax({
                            url:'{{url('editar')}}/'+idproducto,
                            data:form.serialize(),
                            type:'post',
                            dataType:'json',
                            success:function (response) {
                                form.trigger('reset');

                                swal({
                                    position: 'center',
                                    type: 'success',
                                    title: 'Actualizado Correctamente',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                $('#formEdir').modal('hide');

                            }

                        });

                               setTimeout(window.location.reload.bind(window.location), 1000);
                               return false;

                           });








                       }
                   }
               })
           }
       }

        $('body').on('hidden.bs.modal', '.modal', function () {

            $("#cate").empty();


    });
       function eliminarPro(idproducto) {
           if (idproducto){
             $('#dele').click(function () {
              alert(idproducto);

             })
           }
       }



    </script>
    @endsection