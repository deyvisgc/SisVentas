@extends('layouts.header')
@section('contenido')


    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    Modulo Compras
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">SIS | Compras</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Compra</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4><i class="fa fa-cart-arrow-down"></i> <span id="sp_etiqueta">REALIZAR COMPRA</span></h4><br>
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
                                            <input type="text" autofocus name="provedor" id="provedor"  class="form-control" placeholder="Provedor" aria-label="Amount (to the nearest dollar)">
                                            <input type="hidden" autofocus name="idprove" id="idprove"  class="form-control" placeholder="Provedor" aria-label="Amount (to the nearest dollar)">
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
                                            <input type="text" name="precio" id="precio"  class="form-control" placeholder="Precio" aria-label="Amount (to the nearest dollar)">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Cantidad</span>
                                            </div>
                                            <input type="text" id="codigop" name="codigop" hidden >
                                            <input type="text" id="idproducto" name="idproducto" hidden>
                                            <input type="text" id="cantidad" name="cantidad" class="form-control" onkeyup="calculasubtotal();" placeholder="Ingresar Cantidad" aria-label="Username">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Subtotal</span>
                                            </div>
                                            <input type="number" readonly="readonly" id="Subto" name="Subtotal" class="form-control" placeholder="$$$" aria-label="Username">
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-inverse-success btn-fw float-right" id="btn_agregar">Agregar</button>

                                </div>

                            </div>
                            <div class="col-md-6">
                                <center><h6 class="card-title">Detalles de Compra</h6></center>
                                <div id="dragula-right" class="py-2">
                                    <center>
                                        <div class="popover-static-demo">
                                            <div class="popover bs-popover-bottom bs-popover-bottom-demo popover-success">
                                                <div class="arrow"></div>
                                                <h4 class="popover-header">Detalle del Producto</h4>
                                                <div class="popover-body">
                                                    <p>Precio Unitario: <strong id="dprecio"> 0</strong></p>
                                                    <p>Stock: <strong id="cantidadP">0.0</strong></p><br>
                                                </div>
                                            </div>
                                            <div class="popover bs-popover-bottom bs-popover-bottom-demo popover-warning">
                                                <div class="arrow"></div>
                                                <h4 class="popover-header">Total a Pagar</h4>
                                                <div class="popover-body">
                                                    <p>Cantidad Productos: <strong id="conta">0</strong></p>
                                                    <center><h4 class="toalApa">0.00</h4></center>
                                                    <br>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <button type="button" class="btn btn-inverse-danger btn-fw float-right" id="btn_comprar">Comprar</button>
                                    </center>


                                </div>

                            </div>

                        </div>

                        </div>

                    </div>
                </div>

            </div>
            <!--Tabla con el listado de productos para vender-->
            <div class="container">
                <div class="row">
                    <div  class="col-lg-12">
                        <div class="table-responsive">
                            <center>  <table  id="detalle_compra" class="table">
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
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="https://www.urbanui.com/" target="_blank">Urbanui</a>. All rights reserved.</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="far fa-heart text-danger"></i></span>
            </div>
        </footer>
        <!-- partial -->
    </div>


    @endsection

@section('footer_scripts')
    <script>
        var i=1;
        $(document).ready(function() {

            $('#producto').autocomplete({
                source:function (request ,response) {
                    $.ajax({
                        url:'{{url('cargarPrdo')}}',
                        dataType:'json',
                        type:'get',
                        data:{
                            texto:request.term
                        },
                        success:function (data) {
                            response(data.list_producto);
                        }

                    });

                },
                delay:200,
                minlength:8,
                select:function (event,ui) {

                    $('#producto').val(ui.item.value);
                   $('#cantidadP').html(ui.item.cantidad);
                   $('#codigop').val(ui.item.codigo);
                    $('#idproducto').val(ui.item.idpr);


                    return false;
                }

            });

            $('#provedor').autocomplete({
                source:function (request ,response) {
                    $.ajax({
                        url:'{{url('cargarProve')}}',
                        dataType:'json',
                        type:'get',
                        data:{
                            texto:request.term
                        },
                        success:function (data) {
                            response(data.list_prove);
                        }

                    });

                },
                delay:200,
                minlength:12,
                select:function (event,ui) {

                    $('#provedor').val(ui.item.value);
                    $('#idprove').val(ui.item.id);

                    return false;
                }

            });
            })

        $('#btn_agregar').click(function () {
//capturo los datos de los imput para registrarlo en la tabla
         var nombre =document.getElementById('producto').value;
         var idprodcuto=document.getElementById('idproducto').value;
         var idprove=document.getElementById('idprove').value;
         var codigo=document.getElementById('codigop').value;
         var cantidad=document.getElementById('cantidad').value;
         var precio=document.getElementById('precio').value;
         var monto=parseFloat(cantidad)*parseFloat(precio);
         //valido si la existe una cantidad si no existe no pasara nada
            if(cantidad.trim()!='' && cantidad >0 && nombre.trim()!='' && precio.trim()!=''){

                var fila = '<tr class="fila" id="row' + i + '">' +
                    '<td hidden id="idproducto">' + idprodcuto + '</td>' +
                    '<td hidden id="idprove">' + idprove + '</td>' +
                    '<td>' + nombre + '</td><td>' + codigo + '</td>' +
                    '<td id="can">' + cantidad + '</td>' +
                    '<td id="precio">' + precio + '</td>' +
                    '<td class="monto" id="monto" >' + monto.toFixed(2) + '</td>' +
                    '<td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">Borrar</button>' +
                    '</td></tr>'; //esto seria lo que contendria la fila
                i++
                //si hay datos se registrara en la tabla temporal
                $('#cuerpo').append(fila);
            } else {
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'porfavor registre todo el formulario !',
                });
            }


            $('#conta').text('');//esta instruccion limpia el div adicioandos para que no se vayan acumulando
            //creo una nueva fila para hacer el conteo de los productos registrados
            var nFilas = $("#detalle_compra tr").length;
            $("#conta").append(nFilas - 1);
            //se resta menos 1 para no contar la fila de cabezera que tenemos en la tabla
            document.getElementById("precio").value ="";
            document.getElementById("cantidad").value ="";
            document.getElementById("codigop").value = "";
            document.getElementById("producto").value = "";
            document.getElementById("Subto").value = "";
            $("#dprecio").html('0');
            $("#cantidadP").html('0');
            document.getElementById("producto").focus();


        });
        //aqui calculo la suma de todos los montos de la tabla y lo igualo a la variable total luego lo muestro en la etiqueta
        $('#btn_agregar').click(function () {
            var total =0;
            $('.monto').each(function () {
                total +=parseFloat($(this).html());
            })
            $('.toalApa').html(total.toFixed(2));

        });
        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            //cuando da click obtenemos el id del boton
            $('#row' + button_id + '').remove(); //borra la fila

            //limpia el para que vuelva a contar las filas de la tabla
            $("#conta").text("");
            var nFilas = $("#detalle_compra tr").length;
            $("#conta").append(nFilas - 1);
        });

        $(document).on('click','.btn_remove',function () {
            var totalrenew = $('.toalApa').html();
            var monto = $('.monto').html();
            var newtotal = parseFloat(totalrenew) - parseFloat(monto);

            var total=0;
            $('.monto').each(function () {
                total += parseFloat($(this).html());
            });
            $('.toalApa').html(total.toFixed(2));

            console.log('totalrenew:'+totalrenew);
            console.log('monto:'+monto);
            console.log('newtotal:'+newtotal);
        });


        function calculasubtotal(){
                var cantidad=document.getElementById("cantidad").value;
                var precio=document.getElementById("precio").value;
                var subtotal=parseFloat(cantidad)*parseFloat(precio);
            $('#Subto').val(subtotal.toFixed(2));

        }
        $('#btn_comprar').click(function () {
            var array = [];
            var headers = [];
            var data=[];
            $('#detalle_compra th').each(function(index, item) {
                headers[index] = $(item).html();
            });
            $('#detalle_compra tr').has('td').each(function() {
                var arrayItem = {};
                $('td', $(this)).each(function(index, item) {
                    arrayItem[headers[index]] = $(item).html();
                });
                array.push(arrayItem);
                $.ajax({
                    url:'{{url('GuardarCompra')}}',
                    dataType:'json',
                    type:'get',
                    data:{'array':JSON.stringify(arrayItem)},
                    success:function (reponse) {
                        alert(reponse);
                    }
                })


            });





        });

    </script>
    @endsection