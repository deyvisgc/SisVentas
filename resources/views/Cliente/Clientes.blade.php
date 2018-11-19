@extends('layouts.header')


@section('contenido')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    Listado de Clientes<a  data-toggle="modal" data-target="#modalRegisterForm"> <span class="btn btn-outline-success">+ Nuevo</span></a></h3>

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
                                <table id="cliente-table" class="table">
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
            <div class="modal-dialog " >
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title">Registrar Cliente</h1>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="RegCliente"  >
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" required="Campo Obligatorio" name="nombre" placeholder="nombre" >
                                        <p class="errorName text-danger hidden"></p>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Apellido Paterno</label>
                                        <input type="text" class="form-control" id="apellido_pa" required="Campo Obligatorio"
                                               name="Apellido_paterno"  placeholder="Apellido Paterno">
                                        <p class="errorApe text-danger hidden"></p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Apellido Materno</label>
                                        <input type="text" class="form-control" id="apellido_ma" required="Campo Obligatorio"
                                               name="Apellido_Materno" placeholder="Apellido Materno" >
                                        <p class="errorAPm text-danger hidden"></p>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Telefono</label>
                                        <input type="number" class="form-control" id="telefono" required="Campo Obligatorio"  name="telefono"  placeholder="Telefono">
                                        <p class="errorTele text-danger hidden"></p>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">N°DNI</label>
                                        <input type="number" class="form-control" id="dni" required="Campo Obligatorio"  name="dni"  placeholder="DNI">
                                        <p class="errorDni text-danger hidden"></p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Direccion</label>
                                        <input type="text" class="form-control" id="direccion" required="Campo Obligatorio" name="Direccion"  placeholder="direccion">
                                        <p class="errorDire text-danger hidden"></p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Correo</label>
                                        <input type="email" class="form-control" id="direccion" required="Campo Obligatorio" name="gmail"  placeholder="correo">
                                        <p class="errorCorr text-danger hidden"></p>
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
                                    <label for="exampleInputEmail1">Fecha Cumpleaños</label>
                                    <div class="input-group date"  data-provide="datepicker">
                                        <input type="text" name="Fecha_cumple"  required="Campo Obligatorio" id="date" class="form-control">
                                        <p class="errorFecha text-danger hidden"></p>
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <label for="exampleInputEmail1">Fecha Ingreso</label>
                                    <div class="input-group date"  data-provide="datepicker">
                                        <input type="text" name="Fecha_Ingreso"  required="Campo Obligatorio" id="date" class="form-control">
                                        <p class="errorFeIn text-danger hidden"></p>
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                    </div>


                                </div>

                                <div class="col-lg-12 col-sm-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Genero</label>
                                        <select name="sexo" id="sexo" class="form-control" >
                                            <option value="Masculino">Masculino</option>
                                            <option value="Femenino">Femenino</option>
                                        </select>
                                    </div>
                                </div>

                            </div>


                            <center>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button"  class="btn btn-success" id="regisP">Registrar</button>
                                </div>
                            </center>
                        </form>
                    </div>
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
                    <form id="EditCli" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nombre</label>
                                    <input type="text" class="form-control" id="nombre_clie" required="Campo Obligatorio" name="nombress" >
                                    <input type="text" hidden class="form-control" id="idprod" required="Campo Obligatorio" name="idprod" >
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Apellido Paterno</label>
                                    <input type="text" class="form-control" id="apellido_pa_clie" required="Campo Obligatorio"
                                           name="Apellido_paterno"  >
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Apellido Materno</label>
                                    <input type="text" class="form-control" id="apellido_ma_cli" required="Campo Obligatorio"
                                           name="Apellido_Materno"  >
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Telefono</label>
                                    <input type="number" class="form-control" id="telefono_cli" required="Campo Obligatorio"  name="telefono" >
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">N°DNI</label>
                                    <input type="number" class="form-control" id="dni_cli"  name="dni"  >
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Direccion</label>
                                    <input type="text" class="form-control" id="direc_cli" name="Direccion"  >
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Correo</label>
                                    <input type="email" class="form-control" id="correo_cli"  name="gmail" >
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">estado</label>
                                    <input  readonly="readonly" type="text" class="form-control" id="estado_cli"  name="estado" >
                                </div>
                            </div>
                            <div class="col-lg- col-sm-6 col-md-6 col-xs-12">
                                <label for="exampleInputEmail1">Fecha Ingreso</label>
                                <div class="input-group date"  data-provide="datepicker">
                                    <input type="text" name="Fecha_Ingreso"  required="Campo Obligatorio" id="fecha_ingre_cli" class="form-control">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                </div>


                            </div>

                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <label for="exampleInputEmail1">Fecha Cumpleaños</label>
                                <div class="input-group date"  data-provide="datepicker">
                                    <input type="text" name="Fecha_cumple"  required="Campo Obligatorio" id="fecha_naci_cli" class="form-control">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                </div>

                            </div>

                        </div>



                        <center>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button"  class="btn btn-success" id="editar">Actualizar</button>
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
        var tabla;
        $(document).ready(function () {
            tabla = $('#cliente-table').dataTable({
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
                ajax: '{{url('Cliente')}}',

                columns: [

                    {data: 'fullname', name: 'fullname'},
                    {data: 'Direccion', name: 'Direccion'},
                    {data: 'dni', name: 'dni'},
                    {data: 'telefono', name: 'telefono'},
                    {data: 'gmail', name: 'gmail'},
                    {data: 'Fecha_Ingreso'},
                    {data: 'clien_estado',name:'cliente.clien_estado'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},



                ]

            });


        });

        function editarClient(idcliente) {
            if(idcliente){
                $.ajax({
                    url:'{{url('edit/clien')}}/'+idcliente,
                    dataType: 'json',
                    type:'get',
                    success:function (respons) {
                        $.each(respons,function (index,val) {
                            $('#nombre_clie').val(val.nombre);
                            $('#apellido_pa_clie').val(val.Apellido_pat);
                            $('#apellido_ma_cli').val(val.Apellido_Materno);
                            $('#telefono_cli').val(val.telefono);
                            $('#dni_cli').val(val.dni);
                            $('#direc_cli').val(val.Direccion);
                            $('#correo_cli').val(val.gmail);
                            $('#estado_cli').val(val.clien_estado );
                            $('#fecha_ingre_cli').val(val.Fecha_Ingreso);
                            $('#fecha_naci_cli').val(val.Fecha_nacimiento);
                            $('#idprod').val(val.idtipoPersona);

                            $('#editar').click(function (e) {
                                e.preventDefault;
                                var frm=$('#EditCli');
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });
                                $.ajax({
                                    url:'{{url('editar/cliente')}}/'+idcliente,
                                    dataType:'json',
                                    type:'post',
                                    data:frm.serialize(),
                                    success:function (response) {
                                        frm.trigger('reset');
                                        $('#modal-editProve').modal('hide');
                                        swal({
                                            position: 'center',
                                            type: 'success',
                                            title: 'Actualizado Correctamente',
                                            showConfirmButton: false,
                                            timer: 1500
                                        });


                                    }


                                });
                                setTimeout(window.location.reload.bind(window.location), 1000);
                                return false;


                            });


                        });

                    }
                })

            }

        }
        $('#regisP').click(function (e) {
            e.preventDefault();
            var form =$('#RegCliente');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:'{{url('registro/cliente')}}',
                dataType:'json',
                type:'post',
                data:form.serialize(),
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
                        if(response.errors.nombre){
                            $('.errorName').removeClass('hidden');
                            $('.errorName').text(response.errors.nombre);

                        }

                        if(response.errors.Apellido_paterno){
                            $('.errorApe').removeClass('hidden');
                            $('.errorApe').text(response.errors.Apellido_paterno);

                        }

                        if(response.errors.Apellido_Materno){
                            $('.errorAPm').removeClass('hidden');
                            $('.errorAPm').text(response.errors.Apellido_Materno);

                        }
                        if(response.errors.telefono){
                            $('.errorTele').removeClass('hidden');
                            $('.errorTele').text(response.errors.telefono);

                        }
                        if(response.errors.dni){
                            $('.errorDni').removeClass('hidden');
                            $('.errorDni').text(response.errors.dni);

                        }
                        if(response.errors.Direccion){
                            $('.errorDire').removeClass('hidden');
                            $('.errorDire').text(response.errors.Direccion);

                        }
                        if(response.errors.gmail){
                            $('.errorCorr').removeClass('hidden');
                            $('.errorCorr').text(response.errors.gmail);

                        }

                        if(response.errors.Fecha_cumple){
                            $('.errorFecha').removeClass('hidden');
                            $('.errorFecha').text(response.errors.Fecha_cumple);

                        }
                        if(response.errors.Fecha_Ingreso){
                            $('.errorFeIn').removeClass('hidden');
                            $('.errorFeIn').text(response.errors.Fecha_Ingreso);

                        }





                    }

                    if(response.success==true){

                        $('#modalRegisterForm').modal('hide');
                        form.trigger('reset');

                        swal({
                            position: 'center',
                            type: 'success',
                            title: 'Registro Exitoso',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        tabla.api().ajax.reload();

                    }


                },
                error: function(){
                    swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Revise bien su formulario!',
                        footer: '<a href>Escriba bien los datos?</a>'
                    })
                }

            });

            return false;

        });


        $('#modalRegisterForm').on('hidden.bs.modal', function (e) {
            tabla.api().ajax.reload();




        })


    </script>
@endsection