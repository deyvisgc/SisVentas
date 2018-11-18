@extends('layouts.header')
@section('contenido')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h2 class="page-title">
                    Listado  de  Productos faltantes

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
                                <table  id="prod" class="table">
                                    <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Codigo</th>
                                        <th>Categoria</th>
                                        <th>Precio</th>
                                        <th>Stock</th>
                                        <th>Estado</th>
                                        <th>Fecha Registro </th>
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
         role="dialog" tabindex="-1" id="mOrden">
        <div class="modal-dialog" >
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Registrar Producto Faltante</h2>
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
                                        <input type="text"  name="Fecha_Ingreso"  required="Campo Obligatorio" id="fecha_ingre_pro" class="form-control">
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
                                    <input type="number"  name="stock"  id="stock"  class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <center><label for="exampleInputEmail1">Precio Producto</label></center>
                                    <input type="number" readonly="readonly" name="precio_pro"  id="pre_pro"  class="form-control">
                                </div>
                            </div>

                        </div>




                        <center>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                <button type="button"  class="btn btn-success" id="actualizar">Registrar</button>
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
            table =$('#prod').dataTable({
                stateSave: true,
                responsive: true,
                processing: false,
                serverSide : true,
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'pdfHtml5',
                        title: " Lista de los Productos al Limite",
                        text: 'Descargar en PDF',
                        className: 'btn btn-outline-warning btn-icon-text ',
                        messageTop: 'Pedidos de Productos',

                        exportOptions: {
                            columns: [ 0, 1,2, 3, 4, 5,6,7 ]
                        },
                        customize:function(doc) {
                            doc.styles.title = {
                                fontSize: '20',
                                alignment: 'center'
                            }
                            doc.styles.tableHeader = {
                                bold:!0,
                                fontSize:11,
                                color:'black',
                                fillColor:'#F0F8FF',
                                alignment: "left"
                            }
                        }
                    },
                    {
                        extend: 'print',
                        title: " Lista de los Productos al Limite",
                        text: 'Imprimir Reporte',
                        className: 'btn btn-outline-success btn-fw',
                        messageTop: 'Pedidos de Productos',

                        exportOptions: {
                            columns: [ 0, 1,2, 3, 4, 5,6,7 ]
                        },
                    }



                ],
                language: {


                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningun  producto Faltantes",
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
                ajax: '{{url('prodfal')}}',

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
                            return ' <center>   <button title="Nuevo Producto"  ' +
                                '  onclick=editarOrde('+row.idorden_conpra+') type="button" class="btn btn-outline-success btn-rounded btn-icon">\n' +
                                '                          <i class="fas fa-plus-circle"></i></button></center>';
                        }}




                ]


            })


        });


        function editarOrde(idorden_conpra) {
            $('#mOrden').modal('show');
            if(idorden_conpra){

                    $.ajax({
                        url:'{{url('cargarPro')}}/'+idorden_conpra,
                        dataType:'json',
                        type:'get',
                        success:function (response) {

                            $.each(response,function (index , val) {
                                $('#nombre').val(val.nombre_pro);
                                $('#Codigo_pro').val(val.codigo);
                                $('#cantidad_pro').val(val.cantidad);
                                $('#descripccion_pro').val(val.descripcion);
                                $('#estado_pro').val(val.estado);
                                $('#cate').val(val.nombre_cate);
                                $('#fecha_ingre_pro').val(val.Fecha_Registro);
                                $('#pre_pro').val(val.Precio_Pro);
                                $('#stock').val(val.stock);
                                $('#idprod').val(val.idproducto);

                            });


                            $('#actualizar').click(function (e) {
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });
                                e.preventDefault();


                                var frm=$('#EditProdu');
                                $.ajax({
                                    url:'{{url('ActualizPro')}}/'+idorden_conpra,
                                    type:'post',
                                    dataType:'json',
                                    data:frm.serialize(),
                                    success:function (response) {
                                        frm.trigger('reset');
                                        $('#mOrden').modal('hide');

                                        swal({
                                            position: 'center',
                                            type: 'success',
                                            title: 'Actualizado Correctamente',
                                            showConfirmButton: false,
                                            timer: 1500
                                        });



                                        return false;


                                    },
                                    Error:function () {
                                        alert('Falla en actualizar tus datos');
                                    }
                                });
                                table.api().ajax.reload();
                            });


                        }
                    })



            }


        }
        $('#mOrden').on('hidden.bs.modal', function (e) {
            // do something...
            table.api().ajax.reload();


        })
    </script>

@endsection