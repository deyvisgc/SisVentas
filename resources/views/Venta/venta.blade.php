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
                                                <input type="text" id="idcliente" hidden name="idcliente" >
                                                <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
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
                                                <input type="text" id="idproducto" name="idproducto" hidden>
                                                <input type="text" id="cantidad" name="cantidad" required="required" onkeyup="calcularSubTotal();" onkeypress='validate(event)' class="form-control" placeholder="Ingresar Cantidad" aria-label="Username">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Sub Total</span>
                                                </div>
                                                <input type="text" id="subtotal" name="subtotal" required="required"  readonly  class="form-control" placeholder="$$$" aria-label="Username">
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-inverse-success btn-fw float-right" onclick="RegistrarProductos();" id="btn_agregar">Agregar</button><br><br>
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
                                                        <center><h4 class="total"> </h4></center>
                                                        <br>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div><br><br><br>
                                               <button type="button" class="btn btn-inverse-danger btn-fw" data-toggle="modal" data-target="#ventaModal" id="btn_venta">Procesar Venta</button><br><br>
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
                                                    <tbody id="cuerpo">

                                                    </tbody>
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

    <!--MODAL PROCESAR VENTA -->
    <div class="modal fade modal-slide-in-right" aria-hidden="true"
         role="dialog" tabindex="-1" id="ventaModal">
        <div class="modal-dialog" >
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Registrar Pago</h2>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">

                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Total a Pagar</label>
                                    <input type="text" class="form-control" value="00.00" id="totalPagar" readonly="readonly">
                                </div>
                            </div>

                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ingresar Pago: </label>
                                    <input type="text" class="form-control" id="pago" autofocus onkeypress="calcularVuelto();" name="pago" required="">
                                </div>
                            </div>

                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Vuelto:</label>
                                    <input type="text" class="form-control" id="vuelto" readonly="readonly">
                                </div>
                            </div>

                        </div>
                        <center>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                <button type="button"  class="btn btn-success" id="btn_insert_venta">Registrar</button>
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

        $(document).ready(function() {
            var i=1;
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
                    $('#idproducto').val(ui.item.idproducto);


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
                    $('#idcliente').val(ui.item.id);

                    return false;
                }

            });

            $('#btn_agregar').click(function() {

                var nombre = document.getElementById("producto").value;
                var idproducto = document.getElementById("idproducto").value;
                var codigo = document.getElementById("codigop").value;
                var cantidad = document.getElementById("cantidad").value;
                var precio = document.getElementById("precio").value;
                var monto = parseFloat(cantidad)*parseFloat(precio);
                 //contador para asignar id al boton que borrara la fila
                if(cantidad.trim()!=''){

                        var fila = '<tr class="fila" id="row' + i + '">' +
                            '<td hidden id="idproducto">' + idproducto + '</td>' +
                            '<td>' + nombre + '</td>' +
                            '<td>' + codigo + '</td>' +
                            '<td id="cantidad">' + cantidad + '</td>' +
                            '<td>' + precio + '</td>' +
                            '<td class="monto" id="monto">' + monto.toFixed(2) + '</td>' +
                            '<td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">Quitar</button></td>' +
                            '</tr>'; //esto seria lo que contendria la fila
                    i++
                }

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
            //funcion que calcula la suma de los montos para hallar el total de la venta
            $('#btn_agregar').click(function () {
                var total=0;
                $('.monto').each(function () {
                    total += parseFloat($(this).html());
                });
                $('.total').html(total.toFixed(2));

            });

            $('#btn_venta').click(function () {
                var totalapagar=$('.total').html();
                $('#totalPagar').val(totalapagar);
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

            $(document).on('click','.btn_remove',function () {
                var totalrenew = $('.total').html();
                var monto = $('.monto').html();
                var newtotal = parseFloat(totalrenew) - parseFloat(monto);

                var total=0;
                $('.monto').each(function () {
                    total += parseFloat($(this).html());
                });
                $('.total').html(total.toFixed(2));

                console.log('totalrenew:'+totalrenew);
                console.log('monto:'+monto);
                console.log('newtotal:'+newtotal);
            });


            //Registrar venta
            $('#btn_insert_venta').click(function () {
                var dataVenta={};

                var idcliente=$('#idcliente').val();
                var ventatotal=$('.total').html();

                dataVenta.idcliente = idcliente;
                dataVenta.ventatotal=ventatotal;

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url:'{{url('regventa')}}',
                    dataType:'json',
                    type:'post',
                    data:{'array2':JSON.stringify(dataVenta)},
                    success:function (response) {
                        swal({
                            position: 'center',
                            type: 'success',
                            title: 'Registro Exitoso',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    },
                });
            });
        });
        function calcularVuelto(){

            if ($('#cliente').val() == ''){
                alert('INGRESE EL NOMBRE DEL CLIENTE');
            }

            var vuelto = 0;

            var totalaPagar=$('#totalPagar').val();
            var pago=$('#pago').val();
            if(parseFloat(totalaPagar) < parseFloat(pago)){
                vuelto = parseFloat(totalaPagar) - parseFloat(pago);
                $('#vuelto').val(vuelto.toFixed(2));
            }
        }
        function validate(evt) {
            var theEvent = evt || window.event;

            // Handle paste
            if (theEvent.type === 'paste') {
                key = event.clipboardData.getData('text/plain');
            } else {
                // Handle key press
                var key = theEvent.keyCode || theEvent.which;
                key = String.fromCharCode(key);
            }
            var regex = /[0-9]|\./;
            if( !regex.test(key) ) {
                theEvent.returnValue = false;
                if(theEvent.preventDefault) theEvent.preventDefault();
            }
        }
        function calcularSubTotal(){
            var cantidad = document.getElementById("cantidad").value;
            var precio = document.getElementById("precio").value;
            var monto = parseFloat(cantidad)*parseFloat(precio);

            $('#subtotal').val(monto.toFixed(2));
        }
        //Registrar Productos
        function  RegistrarProductos() {
            var idproducto = $('#idproducto').val();
            var cantidad = $('#cantidad').val();
            var monto = $('#subtotal').val();
            var data ={};

            data.idproducto = idproducto;
            data.cantidad = cantidad;
            data.monto = monto;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:'{{url('shop')}}',
                dataType:'json',
                type:'post',
                data:{'array1':JSON.stringify(data)},
                success:function (response) {
                    swal({
                        position: 'center',
                        type: 'success',
                        title: 'Registro Exitoso',
                        showConfirmButton: false,
                        timer: 1500
                    });
                },
            });
        }

    </script>
    @endsection