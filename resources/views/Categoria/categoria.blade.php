@extends('layouts.header')
@section('contenido')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h2 class="page-title">
                    Lista de Categorias<a  data-toggle="modal" data-target="#formRol" id="cate"> <span class="btn btn-outline-warning">+ Nuevo</span></a></h2>

                </h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Categorias</li>
                    </ol>
                </nav>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"></h4>
                    <div class="row">
                        <div class="col-14">
                            <div class="table-responsive">
                                <table  id="table_Cate" class="table">
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
         role="dialog" tabindex="-1" id="formCate">
        <div class="modal-dialog" >
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Registrar Categoria</h2>
                </div>
                <div class="modal-body">
                    <form id="RegisCate"  >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nombre Rol</label>
                                    <input type="text" class="form-control" id="nombre_rol" required="Campo Obligatorio" name="nombre_Cate" >
                                    <p class="errorNom text-danger hidden"></p>
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

    <!-- start endmodal-->
    <div class="modal fade" tabindex="-1" role="dialog" id="mdlEditData">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Actualizar Categoria</h4>
                </div>
                <div class="modal-body">

                    <form role="form" id="frmDataEdit">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="cate_id" name="cate_id" disabled>
                        </div>
                        <div class="form-group">
                            <label for="nombre_Cate" class="control-label">
                                Nombre Categoria
                            </label>
                            <input type="text" class="form-control" id="nombre" name="nombre">
                            <p class="edit_errorName text-danger hidden"></p>
                        </div>
                        <div class="form-group">
                            <label for="nombre_Cate" class="control-label">
                                Estado Categoria<span class="required">*</span>
                            </label>
                            <input type="text" disabled class="form-control" id="esta" name="esta">
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" id="btnUpdate"><i class="glyphicon glyphicon-save"></i>Registrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('footer_scripts')
    <script type="text/javascript" charset="utf-8" async defer>
        var table;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(function() {
            table = $('#table_Cate').DataTable({
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
                    }
                },
                ajax: '{{url('Categorias')}}',
                columns: [
                    { data: 'nombre_cate', name: 'nombre_cate' },
                    { data: 'estado', name: 'estado' },
                    { "data": "action", orderable:false, searchable: false}

                ]
            });
        })

        $('#cate').click(function () {
            $('#formCate').modal('show');
        });
        $('#inser').click(function (e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault();
            var frm=$('#RegisCate');

            $.ajax({
                url:'{{url('Categorias')}}',
                type:'POST',
                dataType:'json',
                data :frm.serialize(),
                success:function (response) {
                    $('.errorNom').addClass('hidden');

                    if(response.errors) {
                        if (response.errors.nombre_Cate) {
                            $('.errorNom').removeClass('hidden');
                            $('.errorNom').text(response.errors.nombre_Cate);

                        }

                    }
                    if(response.success==true){

                        $('#formCate').modal('hide');
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
                }



            });

        });

        $('#table_Cate').on('click','.btnEdit[data-edit]',function(e){
            e.preventDefault();
            var url = $(this).data('edit');
            $.ajax({
                url : url,
                type : 'GET',
                datatype : 'json',
                success:function(data){

                    $('#cate_id').val(data.idcategoria);
                    $('#nombre').val(data.nombre_cate);
                    $('.edit_errorName').addClass('hidden');
                    $('#esta').val(data.estado);
                    $('#mdlEditData').modal('show');

                }

            });

        });


        $('#btnUpdate').on('click',function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault();
            var url="http://127.0.0.1:8000/Categorias/"+$('#cate_id').val();
            var frm=$('#frmDataEdit');
            $.ajax({
                type:'PUT',
                url:url,
                dataType:'json',
                data : frm.serialize(),
                success:function (data) {

                    if(data.errors){
                        if(data.errors.nombre){
                            $('.edit_errorName').removeClass('hidden');
                            $('.edit_errorName').text(data.errors.nombre);
                        }
                    }
                    if (data.success == true) {
                        // console.log(data);
                        $('.edit_errorName').addClass('hidden');
                        frm.trigger('reset');
                        $('#mdlEditData').modal('hide');
                        swal('Success!','Categorias actualisado correctamente','success');
                        table.ajax.reload(null,false);
                    }


                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('porfavor buelva a cargar su formulario');
                }
            });
        });

        $('body').on('hidden.bs.modal', '.modal', function () {

            table.ajax.reload(null,false);


        });
        function CambiarEsta(idcategoria) {
            if(idcategoria){
                $.ajax({
                    url:'{{url('Cate/Desactivar')}}/'+idcategoria,
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
                        table.ajax.reload(null,false);



                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('porfavor buelva a cargar su formulario');
                    }
                })
            }
        }
        function CambiarEs (idcategoria) {
            if(idcategoria){
                $.ajax({
                    url:'{{url('Cate/Activar')}}/'+idcategoria,
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
                        table.ajax.reload(null,false);

                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('porfavor buelva a cargar su formulario');
                    }
                })
            }
        }
    </script>
@endsection