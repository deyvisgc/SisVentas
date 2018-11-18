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
                    Lista de Vendedor<a  data-toggle="modal" data-target="#formVendedor"> <span class="btn btn-outline-success">+ Nuevo</span></a></h3>

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
                        <div class="col-20">
                            <div class="table-responsive">
                                <table id="vende-table" class="table">
                                    <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>dni</th>
                                        <th>telefono</th>
                                        <th>Correo</th>
                                        <th >Fecha Ingre</th>
                                        <th>Estado</th>
                                        <th>Rol</th>
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
         role="dialog" tabindex="-1" id="formVendedor">
        <div class="modal-dialog" >
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Registrar Vendedor</h2>
                </div>
                <div class="modal-body">
                    <form id="RegisVend"  method="post" >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nombre </label>
                                    <input type="text" class="form-control" id="nombre" required="Campo Obligatorio" name="nombre_ve" >
                                    <p class="errorName text-danger hidden"></p>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Apellido Paterno</label>
                                    <input type="text" class="form-control" id="Codigo_pro" required="Campo Obligatorio"
                                           name="apellido_pa_V"  >
                                    <p class="errorApe text-danger hidden"></p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Apellido Materno</label>
                                    <input type="text" class="form-control" id="cantidad_pro" required="Campo Obligatorio"
                                           name="apellido_ma_V"  >
                                    <p class="errorAPm text-danger hidden"></p>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">N# DNI</label>
                                    <input type="number" class="form-control" id="descripccion_pro" required="Campo Obligatorio"  name="dni_Ve" >
                                    <p class="errorDni text-danger hidden"></p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Direccion</label>
                                    <input type="text" class="form-control" id="descripccion_pro" required="Campo Obligatorio"  name="Direccion_ve" >
                                    <p class="errorDire text-danger hidden"></p>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">N# Telefono</label>
                                    <input type="number" class="form-control" id="descripccion_pro" required="Campo Obligatorio"  name="telefono_ve" >
                                    <p class="errorTele text-danger hidden"></p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Estado</label>
                                    <select  class="form-control" id="estado_pro"  name="estado_ve">
                                      <option value="Activo">Activo</option>
                                        <option value="Desactivado">Desactivado</option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Rol</label>
                                    <select  class="form-control" id="rol"  name="rol_ve" >
                                        @foreach($rol as $ro)
                                            <option value="{{$ro->idroles}}">{{$ro->nombre_rol}}</option>
                                            @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-lg- col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Fecha Ingreso</label>
                                    <div class="input-group date"  data-provide="datepicker">
                                        <input type="text" name="fecha_ingreso_ve" id="date" class="form-control">
                                        <p class="errorFecha text-danger hidden"></p>
                                        <div class="input-group-addon">
                                          <span class="input-group-addon input-group-append border-left">
                                          <span class="far fa-calendar-alt input-group-text"></span>
                                          </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg- col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Fecha Nacimiento</label>
                                    <div class="input-group date"  data-provide="datepicker">
                                        <input type="text" name="fecha_naci_ve" id="date" class="form-control">
                                        <p class="errorFeIn text-danger hidden"></p>
                                        <div class="input-group-addon">
                                          <span class="input-group-addon input-group-append border-left">
                                          <span class="far fa-calendar-alt input-group-text"></span>
                                          </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <center>   <label for="exampleInputEmail1">Correo</label> </center>

                                    <input type="email"  class="form-control" id="descripccion_pro" required="Campo Obligatorio"  name="correo_ve" >
                                    <p class="errorCorr text-danger hidden"></p>
                                </div>
                            </div>
                        </div>
                        <center>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button"  class="btn btn-success" id="RegisV">Registrar</button>
                            </div>
                        </center>


                    </form>

                </div>
            </div>
        </div>
    </div>

    <!--modal Update-->
    <div class="modal fade modal-slide-in-right" aria-hidden="true"
         role="dialog" tabindex="-1" id="mUpdate">
        <div class="modal-dialog" >
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Actualizar Vendedor</h2>
                </div>
                <div class="modal-body">
                    <form id="UpdVend"  method="post" >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nombre </label>
                                    <input type="text" class="form-control" id="nombre_ve" required="Campo Obligatorio" name="nombre_ve" >
                                    <input type="text" hidden class="form-control" id="idpersona" required="Campo Obligatorio" name="idpersona" >
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Apellido Paterno</label>
                                    <input type="text" class="form-control" id="apellido_pa_V" required="Campo Obligatorio"
                                           name="apellido_pa_V"  >
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Apellido Materno</label>
                                    <input type="text" class="form-control" id="apellido_ma_V" required="Campo Obligatorio"
                                           name="apellido_ma_V"  >
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">N# DNI</label>
                                    <input type="number" class="form-control" id="dni_Ve" required="Campo Obligatorio"  name="dni_Ve" >
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                      <label for="exampleInputEmail1">Correo</label>
                                    <input type="email"  class="form-control" id="correo_ve" required="Campo Obligatorio"  name="correo_ve" >
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">N# Telefono</label>
                                    <input type="number" class="form-control" id="telefono_ve" required="Campo Obligatorio"  name="telefono_ve" >
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Estado</label>
                                    <input readonly="readonly"  class="form-control" id="estado_ve"  name="estado_ve">

                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Rol</label>
                                    <select  class="form-control" id="rol_ve"  name="rol_ve" >
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg- col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Fecha Ingreso</label>
                                    <div class="input-group date"  data-provide="datepicker">
                                        <input type="text" name="fecha_ingreso_ve" id="fecha_ingreso_ve" class="form-control">
                                        <div class="input-group-addon">
                                          <span class="input-group-addon input-group-append border-left">
                                          <span class="far fa-calendar-alt input-group-text"></span>
                                          </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg- col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Fecha Nacimiento</label>
                                    <div class="input-group date"  data-provide="datepicker">
                                        <input type="text" name="fecha_naci_ve" id="fecha_naci_ve" class="form-control">
                                        <div class="input-group-addon">
                                          <span class="input-group-addon input-group-append border-left">
                                          <span class="far fa-calendar-alt input-group-text"></span>
                                          </span>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <center>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button"  class="btn btn-success" id="UpdaV">Actualizar</button>
                            </div>
                        </center>


                    </form>

                </div>
            </div>
        </div>
    </div>
    <!--modal delete-->
    <div id="deletVen" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <form id="frmdele">
            <div class="modal-content">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
                    <button type="button"  id="deleV" class="btn btn-danger" >Eliminar</button>
                </div>
            </div>
            </form>
        </div>
    </div>



    @endsection

@section('footer_scripts')
    <script>
        var  table;
        $(document).ready(function () {



            table=$('#vende-table').DataTable({
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
                ajax: '{{url('Vendedor')}}',

                columns: [

                    {data: 'fullname', name: 'fullname'},
                    {data: 'dni', name: 'dni'},
                    {data: 'telefono', name: 'telefono'},
                    {data: 'email', name: 'email'},
                    {data: 'Fecha_ingreso',name:'Fecha_ingreso'},
                    {data: 'estado',name:'vendedor.estado'},
                    {data: 'nombre_rol',name:'roles.nombre_rol'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},



                ]



            })


        });

        $('#RegisV').click(function (e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault;
            var frm=$('#RegisVend');
            $.ajax({
                url:'{{url('Vendedor')}}',
                dataType:'json',
                type:'post',
                data:frm.serialize(),
                success:function (response) {
                    $('.errorName').addClass('hidden');
                    $('.errorApe').addClass('hidden');
                    $('.errorAPm').addClass('hidden');
                    $('.errorAPm').addClass('hidden');
                    $('.errorTele').addClass('hidden');
                    $('.errorDni').addClass('hidden');
                    $('.errorDire').addClass('hidden');
                    $('.errorCorr').addClass('hidden');
                    $('.errorFecha').addClass('hidden');
                    $('.errorFeIn').addClass('hidden');
                    if(response.errors){
                        if(response.errors.nombre_ve){
                            $('.errorName').removeClass('hidden');
                            $('.errorName').text(response.errors.nombre_ve);

                        }

                        if(response.errors.apellido_pa_V){
                            $('.errorApe').removeClass('hidden');
                            $('.errorApe').text(response.errors.apellido_pa_V);

                        }

                        if(response.errors.apellido_ma_V){
                            $('.errorAPm').removeClass('hidden');
                            $('.errorAPm').text(response.errors.apellido_ma_V);

                        }
                        if(response.errors.telefono_ve){
                            $('.errorTele').removeClass('hidden');
                            $('.errorTele').text(response.errors.telefono_ve);

                        }
                        if(response.errors.dni_Ve){
                            $('.errorDni').removeClass('hidden');
                            $('.errorDni').text(response.errors.dni_Ve);

                        }
                        if(response.errors.Direccion_ve){
                            $('.errorDire').removeClass('hidden');
                            $('.errorDire').text(response.errors.Direccion_ve);

                        }
                        if(response.errors.correo_ve){
                            $('.errorCorr').removeClass('hidden');
                            $('.errorCorr').text(response.errors.correo_ve);

                        }

                        if(response.errors.fecha_naci_ve){
                            $('.errorFecha').removeClass('hidden');
                            $('.errorFecha').text(response.errors.fecha_naci_ve);

                        }
                        if(response.errors.fecha_ingreso_ve){
                            $('.errorFeIn').removeClass('hidden');
                            $('.errorFeIn').text(response.errors.fecha_ingreso_ve);

                        }
                    }

                    if(response.success==true){

                        $('#formVendedor').modal('hide');
                        frm.trigger('reset');

                        swal({
                            position: 'center',
                            type: 'success',
                            title: 'Registro Exitoso',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        table.ajax.reload();

                    }

                },
                error: function(){
                    alert("error en tu proceso");
                }

            });

        })
        function editarV(idVendedor) {
            if(idVendedor){
               $.ajax({
                   url:'{{url('cargar/Vende')}}/'+idVendedor,
                   dataType: 'json',
                   type:'get',
                   success:function (response) {
                      $.each(response.vende,function (index, val) {
                          $('#nombre_ve').val(val.nombre);
                          $('#idpersona').val(val.idpersona);
                          $('#apellido_pa_V').val(val.Apellido_Pater);
                          $('#apellido_ma_V').val(val.Apellido_Mater);
                          $('#dni_Ve').val(val.dni);
                          $('#telefono_ve').val(val.telefono);
                          $('#correo_ve').val(val.email);
                          $('#fecha_ingreso_ve').val(val.Fecha_ingreso);
                          $('#fecha_naci_ve').val(val.Fecha_nacimiento);
                          $('#estado_ve').val(val.estado);
                          $.each(response.rol,function (index,va) {
                              if(va.idroles===val.rol_idrol){
                                  $("#rol_ve").append('<option value='+va.idroles+ '  selected >'+va.nombre_rol+ '</option>');
                              }else {
                                  $("#rol_ve").append('<option value='+va.idroles+ '  >'+va.nombre_rol+ '</option>');
                              }

                          });
                          $('#UpdaV').click(function (e) {
                              $.ajaxSetup({
                                  headers: {
                                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                  }
                              });
                              e.preventDefault;
                              var frm=$('#UpdVend');
                              $.ajax({
                                 url:'{{url('Update/Vende')}}/'+idVendedor,
                                 dataType:'json',
                                 type:'post',
                                 data:frm.serialize(),
                                 success:function (response) {
                                     frm.trigger('reset');
                                     $('#mUpdate').modal('hide');
                                     swal({
                                         position: 'center',
                                         type: 'success',
                                         title: 'Actualizado correctamente',
                                         showConfirmButton: false,
                                         timer: 1500
                                     });

                                     table.ajax.reload();


                                 },
                                  Error:function () {
                                      alert('Falla en actualizar tus datos');
                                  }
                              });


                          })

                      })
                   },
                   Error:function () {
                       alert('error a cargar ');
                   }
               })
            }
        }


function eliminarV(idVendedor){
            if(idVendedor){

                $('#deleV').click(function () {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url:'{{url('Delete')}}/'+idVendedor,
                        dataType:'json',
                        type:'get',
                        success:function (response) {
                            $('#deletVen').modal('hide');
                            swal({
                                position: 'center',
                                type: 'success',
                                title: 'Vendedor Eliminado',
                                showConfirmButton: false,
                                timer: 1500
                            });

                            table.ajax.reload();

                        },
                        Error:function () {
                            alert("error en el proceso de eliminar");


                        }

                    })

                });
            }







        }

        function Activar(idVendedor) {
            if(idVendedor){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var frm=$('#frmdele');
                $.ajax({
                    url:'{{url('Activar')}}/'+idVendedor,
                    dataType:'json',
                    type:'post',
                    data:frm.serialize(),
                    success:function (response) {
                        $('#deletVen').modal('hide');
                        swal({
                            position: 'center',
                            type: 'success',
                            title: 'Exitoso al cambiar estado',
                            showConfirmButton: false,
                            timer: 1500
                        });

                        table.ajax.reload();

                    },
                    Error:function () {
                        alert("error en el proceso de eliminar");


                    }

                })
            }



        }
        function Desactivar(idVendedor) {
            if(idVendedor){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var frm=$('#frmdele');
                $.ajax({
                    url:'{{url('Desactivar')}}/'+idVendedor,
                    dataType:'json',
                    type:'post',
                    data:frm.serialize(),
                    success:function (response) {
                        $('#deletVen').modal('hide');
                        swal({
                            position: 'center',
                            type: 'success',
                            title: 'Exitoso al cambiar estado',
                            showConfirmButton: false,
                            timer: 1500
                        });

                        table.ajax.reload();

                    },
                    Error:function () {
                        alert("error en el proceso de eliminar");


                    }

                })
            }



        }
        $('body').on('hidden.bs.modal', '.modal', function () {

            $("#rol_ve").empty();



        })

        $('#deletVen').on('hidden.bs.modal', function (e) {
            // do something...
            location.reload();


        })

    </script>
    @endsection