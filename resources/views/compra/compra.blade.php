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
                                            <input type="text" id="codigop" name="codigop" hidden>
                                            <input type="text" id="cantidad" name="cantidad" class="form-control" placeholder="Ingresar Cantidad" aria-label="Username">
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-inverse-success btn-fw float-right" id="btn_agregar">Agregar</button><br><br>
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
                                                    <p>Cantidad Productos: <strong id="adicionados"> </strong></p>
                                                    <center><h4>0.00</h4></center>
                                                    <br>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </center>
                                </div>
                            </div>

                        </div>

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
    </script>
    @endsection