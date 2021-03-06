@extends('layouts.header')
@section('contenido')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h2 class="page-title">
                    Almacen de Productos

                </h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">
                                Home
                            </a></li>
                        <li class="breadcrumb-item active" aria-current="page">Almacen</li>
                    </ol>
                </nav>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"></h4>
                    <div class="row">
                        <div class="col-14">
                            <div class="table-responsive">
                                <table  id="Almacen" class="table">
                                    <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Codigo</th>
                                        <th>Categoria</th>
                                        <th>Precio</th>
                                        <th>Stock</th>
                                        <th>Estado</th>
                                        <th>Fecha </th>
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

    <div class="modal fade modal-slide-in-right" aria-hidden="true"
         role="dialog" tabindex="-1" id="AlmaForm">
        <div class="modal-dialog" >
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Actualizar Inventario</h2>
                </div>
                <div class="modal-body">
                    <form id="EditProdu" method="post"  >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nombre Producto</label>
                                    <input type="text" readonly="readonly" class="form-control" id="nombre" required="Campo Obligatorio" name="nombre_pro" >
                                    <input type="hidden"  class="form-control" id="idprod" required="Campo Obligatorio" name="idprod" >

                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Codigo</label>
                                    <input type="number" readonly="readonly" class="form-control" id="Codigo_pro" required="Campo Obligatorio"
                                           name="Codigo"  >
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">descripccion</label>
                                    <input type="text" readonly="readonly" class="form-control" id="descripccion_pro" required="Campo Obligatorio"  name="descripccion" >
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
                                    <input readonly="readonly"  class="form-control" id="cate"  name="categoria" >
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
                                    <center><label for="exampleInputEmail1">Stock</label></center>
                                    <input type="number" name="stock"  id="stock"  class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <center><label for="exampleInputEmail1">Precio Producto</label></center>
                                    <input type="number" readonly="readonly" name="precio_pro"  id="pre_pro"  class="form-control">
                                </div>
                            </div>
                        </div>
                        <center>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                <button type="button"  class="btn btn-success" id="editar">Actualizar</button>
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
    var table;
    $(document).ready(function () {
        table =  $('#Almacen').dataTable({
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
            ajax: '{{url('almacen')}}',

            columns: [
                {data: 'nombre_pro', name:'nombre_pro'},
                {data: 'codigo', name:'codigo'},
                {data: 'nombre_cate',name:'nombre_cate'},
                {data: 'Precio_Pro', name:'Precio_Pro'},
                {data: 'stock', name:'stock'},
                {data: 'estado',name:'estado',
                "render":function (data,type,row) {
                    if(row.estado==='producto activado'){
                        return ' <label class="badge badge-outline-success badge-pill">producto activado</label>';
                    }else if (row.estado==='producto desactivado'){
                        return ' <label class="badge badge-outline-danger badge-pill">productos Agotados</label>';
                    }
                    
                }
                },
                {data: 'Fecha_Registro',name:'Fecha_Registro'},
                {data: null,
                    render: function ( data, type, row ) {
                        return ' <center>   <button title="Actualizar "  data-cache="false"' +
                            '  onclick=editarAlm('+row.idalmacen+') type="button" class="btn btn-outline-warning btn-rounded btn-icon">\n' +
                            '                          <i class="fas fa-user-edit"></i></button></center>';
                    }}



            ]


        })


    });
    function editarAlm(idalmacen) {
        $('#AlmaForm').modal('show');
    if (idalmacen){
        $.ajax({
           url:'{{url('alma')}}/'+idalmacen,
            dataType:'json',
            type:'get',
            success:function (response) {
              $.each(response,function (index , val) {
                  $('#nombre').val(val.nombre_pro);
                  $('#Codigo_pro').val(val.codigo);
                  $('#descripccion_pro').val(val.descripcion);
                  $('#estado_pro').val(val.estado);
                  $('#cate').val(val.nombre_cate);
                  $('#fecha_ingre_pro').val(val.Fecha_Registro);
                  $('#pre_pro').val(val.Precio_Pro);
                  $('#stock').val(val.stock);
                  $('#idprod').val(val.idproducto);

              })
                $('#editar').click(function (e) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    e.preventDefault();


                    var frm=$('#EditProdu');
                    $.ajax({
                        url:'{{url('update')}}/'+idalmacen,
                        type:'post',
                        dataType:'json',
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
                            $('#AlmaForm').modal('hide');
                            return false;


                        },
                        Error:function () {
                            alert('Falla en actualizar tus datos');
                        }
                    });
                    table.api().ajax.reload();
                });

            }
        });
    }

    }
    $('#AlmaForm').on('hidden.bs.modal', function (e) {
        // do something...
        table.api().ajax.reload();


    })
    

</script>

    @endsection