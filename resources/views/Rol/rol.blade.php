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
                    Lista de Roles<a  data-toggle="modal" data-target="#formRol"> <span class="btn btn-outline-warning">+ Nuevo</span></a></h2>

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
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Estado</label>
                                    <select type="number" class="form-control" id="estado" required="Campo Obligatorio" name="estado"  >
                                        <option value="Activo">Activo</option>
                                        <option value="Inactivo">Inactivo</option>
                                    </select>
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
    <div id="deletRol" class="modal fade">
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
                    <button type="button"  id="deleRol" class="btn btn-danger" >Eliminar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_scripts')
    <script>

        var tabla;
    $(document).ready(function () {
    table= $('#rol').dataTable({
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
              swal({
                  position: 'center',
                  type: 'success',
                  title: 'Registro Exitoso',
                  showConfirmButton: false,
                  timer: 1500
              });
              $('#formRol').modal('hide');
              table.ajax.reload();
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
                  setTimeout(window.location.reload.bind(window.location), 1000);
                  return false;

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
                    $('#EditRol').modal('hide');
                    setTimeout(window.location.reload.bind(window.location), 1000);
                    return false;

                }
            })
        }
    }

    </script>
    @endsection