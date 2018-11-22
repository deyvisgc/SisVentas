@extends('layouts.header')
@section('contenido')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    Listado de Provedores<a  data-toggle="modal" data-target="#modalRegisterForm"> <span class="btn btn-outline-success">+ Nuevo</span></a></h3>

                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Provedor</li>
                    </ol>
                </nav>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"></h4>
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
        <div class="modal-dialog" >
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
                                  name="Apellido_pat"   placeholder="Apellido Paterno">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Apellido Materno</label>
                                <input type="text" class="form-control" id="apellido_ma" required="Campo Obligatorio"
                                        name="Apellido_Mat"  placeholder="Apellido Materno" >
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Telefono</label>
                                <input type = "text" maxlength="9" onkeypress="return controltag(event)" class="form-control telef" id="telefono" required="Campo Obligatorio"  name="telefono"  placeholder="Telefono">
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">N°DNI</label>
                                <input type = "text" maxlength="8" onkeypress="return controltag(event)" class="form-control" id="dni" required="Campo Obligatorio"  name="dni"  placeholder="DNI">
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
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
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
                                         name="Apellido_pat">
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
                                  <input type="text" maxlength="5"  lass="form-control" id="telefono_pro" required="Campo Obligatorio"  name="telefono" >
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
                              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                              <button type="submit"  class="btn btn-success" id="editar">Actualizar</button>
                          </div>
                      </center>


                  </form>

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
        var  table;
        $(document).ready(function () {



            table =$('#produc-table').DataTable({
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


        });
        function controltag(e) {
            tecla = (document.all) ? e.keyCode : e.which;
            if (tecla==8) return true; // para la tecla de retroseso
            else if (tecla==0||tecla==9)  return true; //<-- PARA EL TABULADOR-> su keyCode es 9 pero en tecla se esta transformando a 0 asi que porsiacaso los dos
           patron =/[0-9\s]/;// -> solo numeros
            te = String.fromCharCode(tecla);
            return patron.test(te);
        }



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

        function Desacti(idprovedor){
            if(idprovedor){

                $.ajax({
                    url:'{{url('Estado/prove')}}/'+idprovedor,
                    dataType:'json',
                    type:'get',
                    success:function (resposne) {
                        if(resposne.errors){

                            alert('Error al cambair estado');
                        }
                        if(resposne.success==true){
                            swal({
                                position: 'center',
                                type: 'success',
                                title: 'Exito al cambiar estado',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            table.ajax.reload(null,false);
                        }

                        return false;

                    }
                })
            }

        }

        function Activ(idprovedor){
            if(idprovedor){

                $.ajax({
                    url:'{{url('Estado/Act')}}/'+idprovedor,
                    dataType:'json',
                    type:'get',
                    success:function (resposne) {
                        if(resposne.errors){

                            alert('Error al cambair estado');
                        }
                        if(resposne.success==true){
                            swal({
                                position: 'center',
                                type: 'success',
                                title: 'Exito al cambiar estado',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $('#EditRol').modal('hide');
                            table.ajax.reload(null,false);
                        }

                        return false;

                    }
                })
            }

        }

    </script>
@endsection
