@extends('layouts.header')
@section('contenido')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    Registrar Venta
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">ventas</li>
                    </ol>
                </nav>
            </div>
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4><i class="fa fa-cart-arrow-down"></i> <span id="sp_etiqueta">REALIZAR VENTA</span></h4><br>
                            <p class="card-description">

                            </p>

                            <div class="row">
                                <div class="col-md-6">
                                    <div id="dragula-left" class="py-2">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary text-white">Buscar</span>
                                                </div>
                                                <input type="text" autofocus name="cliente" id="cliente"  class="form-control" placeholder="Cliente" aria-label="Amount (to the nearest dollar)">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Buscar</span>
                                                </div>
                                                <input type="text" autofocus id="producto" name="bu_pro" class="form-control"  placeholder="Producto" aria-label="Username">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary text-white">$</span>
                                                </div>
                                                <input type="text" name="precio" id="precio" disabled class="form-control" placeholder="Precio" aria-label="Amount (to the nearest dollar)">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Cantidad</span>
                                                </div>
                                                <input type="text" id="codigop" name="codigop" hidden>
                                                <input type="text" id="cantidad" name="cantidad" class="form-control" placeholder="Ingresar Cantidad" aria-label="Username">
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-inverse-success btn-fw float-right" id="btn_agregar">Agregar</button><br><br>
                                    </div>
                                </div>
                              <div class="col-md-6">
                                  <center><h6 class="card-title">Detalles</h6></center>
                                  <div id="dragula-right" class="py-2">
                                       <center>
                                           <div class="popover-static-demo">
                                                <div class="popover bs-popover-bottom bs-popover-bottom-demo popover-success">
                                                    <div class="arrow"></div>
                                                    <h4 class="popover-header">Detalle del Producto</h4>
                                                    <div class="popover-body">
                                                        <p>Precio Unitario: <strong id="dprecio"> 0</strong></p>
                                                        <p>Stock: <strong id="cantidadP"> 0</strong></p><br>
                                                    </div>
                                                </div>
                                                <div class="popover bs-popover-bottom bs-popover-bottom-demo popover-warning">
                                                    <div class="arrow"></div>
                                                    <h4 class="popover-header">Total a Pagar</h4>
                                                    <div class="popover-body">
                                                        <p>Cantidad Productos: <strong id="adicionados"> </strong></p>
                                                        <center><h4>54555540.60</h4></center>
                                                        <br>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                       </center>
                                  </div>
                              </div>
                            </div>
                        <!--Tabla con el listado de productos para vender-->
                            <div class="container">
                                <div class="row">
                                    <div  class="col-lg-12">
                                        <div class="table-responsive">
                                            <center>  <table  id="detalle_venta" class="table">
                                                    <thead>
                                                    <tr>
                                                        <th>Nombre</th>
                                                        <th>Código</th>
                                                        <th>Cantidad</th>
                                                        <th>Precio</th>
                                                        <th>Monto</th>
                                                        <th>Opciones</th>
                                                    </thead>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="cuerpo"></tbody>
                                                </table>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('footer_scripts')
    <script>
        $(document).ready(function() {

            $('#producto').autocomplete({
                source:function (request ,response) {
                      $.ajax({
                          url:'{{url('cargarPro')}}',
                          dataType:'json',
                          type:'get',
                          data:{
                              texto:request.term
                          },
                          success:function (data) {
                              response(data.list_cliente);
                          }

                      });

                },
                delay:200,
                minlength:8,
                select:function (event,ui) {

                    $('#producto').val(ui.item.value);
                    $('#precio').val(ui.item.precio);
                    $('#dprecio').html(ui.item.precio);
                    $('#codigop').val(ui.item.codigo);
                    $('#cantidadP').html(ui.item.cantidad);


                    return false;
                }

     });

            $('#cliente').autocomplete({
                source:function (request ,response) {
                    $.ajax({
                        url:'{{url('cargarClie')}}',
                        dataType:'json',
                        type:'get',
                        data:{
                            texto:request.term
                        },
                        success:function (data) {
                            response(data.list_cliente);
                        }

                    });

                },
                delay:200,
                minlength:8,
                select:function (event,ui) {

                    $('#cliente').val(ui.item.value);

                    return false;
                }

            });
            $('#btn_agregar').click(function() {
                var nombre = document.getElementById("producto").value;
                var codigo = document.getElementById("codigop").value;
                var cantidad = document.getElementById("cantidad").value;
                var precio = document.getElementById("precio").value;


                var monto = parseFloat(cantidad)*parseFloat(precio);
                var i = 1; //contador para asignar id al boton que borrara la fila

                var fila = '<tr id="row' + i + '"><td>' + nombre + '</td><td>' + codigo + '</td><td>' + cantidad + '</td><td>' + precio + '</td><td>' + monto + '</td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">Quitar</button></td></tr>'; //esto seria lo que contendria la fila

                i++;

                $('#detalle_venta tr:first').after(fila);
                $("#adicionados").text(""); //esta instruccion limpia el div adicioandos para que no se vayan acumulando
                var nFilas = $("#detalle_venta tr").length;
                $("#adicionados").append(nFilas - 1);
                //le resto 1 para no contar la fila del header
                document.getElementById("precio").value ="";
                document.getElementById("cantidad").value ="";
                document.getElementById("codigop").value = "";
                document.getElementById("producto").value = "";
                $("#dprecio").html('0');
                $("#cantidadP").html('0');
                document.getElementById("producto").focus();
            });

            $(document).on('click', '.btn_remove', function() {
                var button_id = $(this).attr("id");
                //cuando da click obtenemos el id del boton
                $('#row' + button_id + '').remove(); //borra la fila
                //limpia el para que vuelva a contar las filas de la tabla
                $("#adicionados").text("");
                var nFilas = $("#detalle_venta tr").length;
                $("#adicionados").append(nFilas - 1);
            });
        });

    </script>
    @endsection