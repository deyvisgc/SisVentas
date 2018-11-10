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
                    Listado de Provedores<a  data-toggle="modal" data-target="#modalRegisterForm"> <span class="btn btn-outline-success">+ Nuevo</span></a></h3>

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
                        <div class="col-14">
                            <div class="table-responsive">
                                <table id="produc-table" class="table">
                                    <thead>
                                    <tr>
                                        <th>NOMBRE</th>
                                        <th>Direccion</th>
                                        <th>DNI</th>
                                        <th>telefono</th>
                                        <th>Correo</th>
                                        <th>Fecha Ingreso</th>
                                        <th>Estado</th>
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
    <div class="modal fade modal-slide-in-right" aria-hidden="true"
         role="dialog" tabindex="-1" id="modalRegisterForm">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title">Registrar Provedor</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(array('url'=>'crear','method'=>'POST','autocomplete'=>'off')) !!}
                    {{Form::token()}}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nombre</label>
                                <input type="text" class="form-control" id="nombre" required="Campo Obligatorio" name="nombress" placeholder="nombre" >
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Apellido Paterno</label>
                                <input type="text" class="form-control" id="apellido_pa" required="Campo Obligatorio"
                                  name="Apellido_pat"  placeholder="Apellido Paterno">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Apellido Materno</label>
                                <input type="text" class="form-control" id="apellido_ma" required="Campo Obligatorio"
                                        name="Apellido_Mat" placeholder="Apellido Materno" >
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Telefono</label>
                                <input type="number" class="form-control" id="telefono" required="Campo Obligatorio"  name="telefono"  placeholder="Telefono">
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">N°DNI</label>
                                <input type="number" class="form-control" id="dni" required="Campo Obligatorio"  name="dni"  placeholder="DNI">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Direccion</label>
                                <input type="text" class="form-control" id="direccion" required="Campo Obligatorio" name="Direccion"  placeholder="direccion">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Correo</label>
                                <input type="email" class="form-control" id="direccion" required="Campo Obligatorio" name="gmail"  placeholder="correo">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Estado</label>
                                <select name="estado" class="form-control" >
                                   <option value="Activo">Activo</option>
                                    <option value="Inactivo">Inactivo</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Sexo</label>
                                <select name="sexo" id="sexo" class="form-control" >
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                </select>
                            </div>
                        </div>

                          <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                              <label for="exampleInputEmail1">Fecha Cumpleaños</label>
                              <div class="input-group date"  data-provide="datepicker">
                                  <input type="text" name="Fecha_cumple"  required="Campo Obligatorio" id="date" class="form-control">
                                  <div class="input-group-addon">
                                      <span class="glyphicon glyphicon-th"></span>
                                  </div>
                              </div>

                          </div>


                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <label for="exampleInputEmail1">Fecha Ingreso</label>
                        <div class="input-group date"  data-provide="datepicker">
                            <input type="text" name="Fecha_Ingreso"  required="Campo Obligatorio" id="date" class="form-control">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>


                    </div>

                    <center>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit"  class="btn btn-success" id="regisP">Registrar</button>
                        </div>
                    </center>

                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
<!--modal editar-->
    <div class="modal fade modal-slide-in-right" aria-hidden="true"
         role="dialog" tabindex="-1" id="modal-editProve">
        <div class="modal-dialog" >
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title">Actualizar Provedor</h1>
                </div>
                <div class="modal-body">
                  <form id="formularioprovedor" method="post">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="row">
                          <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Nombre</label>
                                  <input type="text" class="form-control" id="nombre_pro" required="Campo Obligatorio" name="nombress" >
                                  <input type="text" hidden class="form-control" id="idprove" required="Campo Obligatorio" name="idprove" >
                              </div>
                          </div>

                          <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Apellido Paterno</label>
                                  <input type="text" class="form-control" id="apellido_pro" required="Campo Obligatorio"
                                         name="Apellido_paterno"  >
                              </div>
                          </div>
                          <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Apellido Materno</label>
                                  <input type="text" class="form-control" id="apellido_ma_pro" required="Campo Obligatorio"
                                         name="Apellido_Materno"  >
                              </div>
                          </div>

                          <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Telefono</label>
                                  <input type="number" class="form-control" id="telefono_pro" required="Campo Obligatorio"  name="telefono" >
                              </div>
                          </div>

                          <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                              <div class="form-group">
                                  <label for="exampleInputEmail1">N°DNI</label>
                                  <input type="number" class="form-control" id="dni_pro"  name="dni"  >
                              </div>
                          </div>
                          <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Direccion</label>
                                  <input type="text" class="form-control" id="direc" name="Direccion"  >
                              </div>
                          </div>
                          <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Correo</label>
                                  <input type="email" class="form-control" id="correo"  name="gmail" >
                              </div>
                          </div>
                          <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                              <div class="form-group">
                                  <label for="exampleInputEmail1">estado</label>
                                  <input  disabled type="text" class="form-control" id="estado"  name="estado" >
                              </div>
                          </div>
                          <div class="col-lg- col-sm-6 col-md-6 col-xs-12">
                              <label for="exampleInputEmail1">Fecha Ingreso</label>
                              <div class="input-group date"  data-provide="datepicker">
                                  <input type="text" name="Fecha_Ingreso"  required="Campo Obligatorio" id="fecha_ingre" class="form-control">
                                  <div class="input-group-addon">
                                      <span class="glyphicon glyphicon-th"></span>
                                  </div>
                              </div>


                          </div>

                          <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                              <label for="exampleInputEmail1">Fecha Cumpleaños</label>
                              <div class="input-group date"  data-provide="datepicker">
                                  <input type="text" name="Fecha_cumple"  required="Campo Obligatorio" id="fecha_naci" class="form-control">
                                  <div class="input-group-addon">
                                      <span class="glyphicon glyphicon-th"></span>
                                  </div>
                              </div>

                          </div>

                      </div>



                      <center>

                          <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <button type="submit"  class="btn btn-success" id="editar">Actualizar</button>
                          </div>
                      </center>


                  </form>

                </div>
            </div>
        </div>
    </div>

    <div id="deletProv" class="modal fade">
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
                    <button type="button" id="cancel" onreset="eliminar()" class="btn btn-info" data-dismiss="modal">Cancel</button>
                    <button type="submit"  id="delete" class="btn btn-danger" >Eliminar</button>
                </div>
            </div>
        </div>
    </div>



</div>

@endsection

@section('footer_scripts')
    <script>
        var  table;
        $(document).ready(function () {



            table =$('#produc-table').DataTable({
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
                ajax: '{{url('Provedor')}}',

                columns: [

                    {data: 'fullname', name: 'fullname'},
                    {data: 'Direccion', name: 'Direccion'},
                    {data: 'dni', name: 'dni'},
                    {data: 'telefono', name: 'telefono'},
                    {data: 'gmail', name: 'gmail'},
                    {data: 'Fecha_Ingreso'},
                    {data: 'estado',name:'provedor.estado'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},



                ]



            })


        })


        function editar(idprovedor) {

            if (idprovedor){
                $.ajax({
                    url:'{{url('update/prove')}}/'+idprovedor,
                    type:'get',
                    dataType:'json',
                    success:function (response) {
                        $('#nombre_pro').val(response.nombre);
                        $('#apellido_pro').val(response.Apellido_pat);
                        $('#apellido_ma_pro').val(response.Apellido_Materno);
                        $('#telefono_pro').val(response.telefono);
                        $('#dni_pro').val(response.dni);
                        $('#correo').val(response.gmail);
                        $('#direc').val(response.Direccion);
                        $('#fecha_ingre').val(response.Fecha_Ingreso);
                        $('#fecha_naci').val(response.Fecha_nacimiento);
                        $('#estado').val(response.estado);
                        $('#idprove').val(response.idtipoPersona);


                        $('#editar').click(function (e) {
                            event.preventDefault();
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            var form=$('#formularioprovedor');
                                console.log(form.serializeArray());

                            $.ajax({
                                url:'{{url('editar/prove')}}/'+idprovedor,
                                data:form.serialize(),
                                type:'post',
                                dataType:'json',
                                success: function (response) {

                                    form.trigger('reset');
                                    $('#modal-editProve').modal('hide');
                                    swal({
                                        position: 'center',
                                        type: 'success',
                                        title: 'Actualizado Correctamente',
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                    table.ajax.reload(null,false);

                                }
                            });

                        });


                    }


                });








            }


        }

        function eliminar(idprovedor){


            if(idprovedor){
                $('#delete').click(function () {


                     $.ajax({
                         url:'{{url('delete/prove')}}/'+idprovedor,
                         type:'get',
                         dataType:'json',

                         success:function (response) {
                         if (response===true){

                                 swal({
                                     position: 'center',
                                     type: 'success',
                                     title: 'Eliminado Correctamente',
                                     showConfirmButton: false,
                                     timer: 1500
                                 });
                             $('#deletProv').modal('hide');



                         }

                         }

                     });

                    setTimeout(window.location.reload.bind(window.location), 4000);

                })

            }



        }




        $('#deletProv').on('hidden.bs.modal', function (e) {
            // do something...
            location.reload();


        })
    </script>
@endsection
