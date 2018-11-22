@extends('layouts.header')
@section('contenido')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h2 class="page-title">
                    Lista de Roles<a  data-toggle="modal" data-target="#formRol"> <span class="btn btn-outline-warning">+ Nuevo</span></a></h2>

                </h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Roles</li>
                    </ol>
                </nav>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"></h4>
                    <div class="row">
                        <div class="col-14">
                            <div class="table-responsive">
                                <table  id="rol" class="table">
                                    <thead>
                                    <tr>
                                        <th>Nombre</th>
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
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="https://www.urbanui.com/" target="_blank"></a>. All rights reserved.</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">SYS | VENTAS Version 1.0 <i class="far fa-heart text-danger"></i></span>
            </div>
        </footer>
    </div>
    <!--modal registrar-->
    <div class="modal fade modal-slide-in-right" aria-hidden="true"
         role="dialog" tabindex="-1" id="formRol">
        <div class="modal-dialog" >
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Registrar Rol</h2>
                </div>
                <div class="modal-body">
                    <form id="RegisRol"  >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nombre Rol</label>
                                    <input type="text" class="form-control" id="nombre_rol" required="Campo Obligatorio" name="nombre_rol" >
                                    <p class="errorNom text-danger hidden"></p>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Estado</label>
                                    <select type="number" class="form-control" id="estado" required="Campo Obligatorio" name="estado"  >
                                        <option value="Activo">Activo</option>
                                        <option value="Inactivo">Inactivo</option>
                                        <p class="errorEsta text-danger hidden"></p>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <center>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button"  class="btn btn-success" id="inser">Registrar</button>
                            </div>
                        </center>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!--modal editar-->

    <div class="modal fade modal-slide-in-right" aria-hidden="true"
         role="dialog" tabindex="-1" id="EditRol">
        <div class="modal-dialog" >
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Actualizar Rol</h2>
                </div>
                <div class="modal-body">
                    <form id="Edit"  >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nombre Rol</label>
                                    <input type="text" class="form-control" id="nombre" required="Campo Obligatorio" name="nombre_rol" >
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Estado</label>
                                    <input type="text" readonly="readonly" class="form-control" id="esta" required="Campo Obligatorio" name="estado"  >

                                    </input>
                                </div>
                            </div>
                        </div>
                        <center>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button"  class="btn btn-success" id="EdiRol">Actualizar</button>
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

        var tabla;
    $(document).ready(function () {
        tabla= $('#rol').dataTable({
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
            ajax: '{{url('Roles')}}',

            columns: [
                {data: 'nombre_rol', name:'nombre_rol'},
                {data: 'rol_estado', name:'rol_estado'},
                {data: 'action', name: 'action', orderable: false, searchable: false}


            ]
        })



    });
    $('#inser').click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault;
      var frm=$('#RegisRol');
      $.ajax({
          url:'{{url('Roles')}}',
          dataType:'json',
          type:'post',
          data:frm.serialize(),
          success:function (response) {

              $('.errorNom').addClass('hidden');

              if(response.errors) {
                  if (response.errors.nombre_rol) {
                      $('.errorNom').removeClass('hidden');
                      $('.errorNom').text(response.errors.nombre_rol);

                  }

              }
              if(response.success==true){

                  $('#formRol').modal('hide');
                  frm.trigger('reset');

                  swal({
                      position: 'center',
                      type: 'success',
                      title: 'Registro Exitoso',
                      showConfirmButton: false,
                      timer: 1500
                  });
                  table.api().ajax.reload();

              }

          },


      })

        return false;
    })
  function editRol(idroles) {
        if(idroles){
            $.ajax({
                url:'{{url('cargar/rol')}}/'+idroles,
                dataType: 'json',
                type:'get',
                success:function (data) {
               $.each(data,function (index,val) {
                   $('#esta').val(val.rol_estado);
                   $('#nombre').val(val.nombre_rol);

               })
                $('#EdiRol').click(function (e) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    e.preventDefault;
                    var frm=$('#Edit');
                    $.ajax({
                        url:'{{url('update/rol')}}/'+idroles,
                        dataType:'json',
                        type:'post',
                        data:frm.serialize(),
                        success:function (response) {
                            frm.trigger('reset');

                            swal({
                                position: 'center',
                                type: 'success',
                                title: 'Actualizado Correctamente',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $('#EditRol').modal('hide');
                            setTimeout(window.location.reload.bind(window.location), 1000);
                            return false;


                        }

                    });


                });
                }
            });

        }

  }

  function eliminar(idroles) {
        if(idroles){
            $('#deleRol').click(function () {
                alert(idroles);

            })
        }


  }
    $('body').on('hidden.bs.modal', '.modal', function () {
        frm.trigger('reset');
        table.ajax.reload();


    });
    function Cambiaresta(idroles) {
        if (idroles){
          $.ajax({
              url:'{{url('Estado')}}/'+idroles,
              dataType:'json',
              type:'get',
              success:function (resposne) {
                  swal({
                      position: 'center',
                      type: 'success',
                      title: 'Exito al cambiar estado',
                      showConfirmButton: false,
                      timer: 1500
                  });
                  $('#EditRol').modal('hide');
                  tabla.api().ajax.reload();

              }
          })
        }

    }

    function Cambiarest(idroles) {
        if (idroles){
            $.ajax({
                url:'{{url('Estado/Activar')}}/'+idroles,
                dataType:'json',
                type:'get',
                success:function (resposne) {
                    swal({
                        position: 'center',
                        type: 'success',
                        title: 'Exito al cambiar estado',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    tabla.api().ajax.reload();
                    return false;

                }
            })
        }
    }

    </script>
    @endsection