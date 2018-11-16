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
                            <h4><i class="fa fa-cart-arrow-down"></i> <span id="sp_etiqueta">Eleccion de productos.</span></h4><br>
                            <p class="card-description">

                            </p>

                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="card-title">Buscar Producto y clientes</h6>
                                    <div id="dragula-left" class="py-2">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary text-white">Search</span>
                                                </div>
                                                <input type="text" name="cliente" id="cliente"  class="form-control" placeholder="Cliente" aria-label="Amount (to the nearest dollar)">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Search</span>
                                                </div>
                                                <input type="text" id="producto" name="bu_pro" class="form-control"  placeholder="Producto" aria-label="Username">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary text-white">$</span>
                                                </div>
                                                <input type="text" name="precio" id="precio" disabled class="form-control" placeholder="Precio" aria-label="Amount (to the nearest dollar)">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Cantidad</span>
                                                </div>
                                                <input type="text" id="cantidad" name="cantidad" class="form-control" placeholder="cantidad" aria-label="Username">
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-inverse-success btn-fw">Agregar</button>

                        <div class="container">
                            <div class="row">
                                <div  class="col-14">
                                    <div class="table-responsive">
                                     <center>  <table  id="users-table" class="table">
                                            <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Codigo</th>
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
                              <div class="col-md-6">
                                  <center><h6 class="card-title">Calcular Pago</h6></center>
                                    <div id="dragula-right" class="py-2">
                                       <center> <div style="padding-right: 15px" class="popover-static-demo">
                                            <div class="popover bs-popover-bottom bs-popover-bottom-demo popover-success">
                                                <div class="arrow"></div>
                                                <h3 class="popover-header">detalle Venta</h3>
                                                <div class="popover-body">
                                                    <p>$.</p>
                                                    <p>total</p>
                                                </div>
                                            </div>
                                            <div class="popover bs-popover-bottom bs-popover-bottom-demo popover-warning">
                                                <div class="arrow"></div>
                                                <h3 class="popover-header">Total a Pagar</h3>
                                                <div class="popover-body">
                                                    <p>$.</p>
                                                    <p>total de productos</p>
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
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Change property of dropped element</h4>
                            <p class="card-description">
                                Drag and drop tasks from todo to in-progress or vice-versa
                            </p>
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="card-title">Todo</h6>
                                    <div id="dragula-event-left" class="py-2">
                                        <div class="card rounded border mb-2">
                                            <div class="card-body p-3">
                                                <div class="media">
                                                    <i class="fa fa-check icon-sm text-primary align-self-center mr-3"></i>
                                                    <div class="media-body">
                                                        <h6 class="mb-1">Build wireframe</h6>
                                                        <p class="mb-0 text-muted">
                                                            Build wireframe for the new app
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card rounded border mb-2">
                                            <div class="card-body p-3">
                                                <div class="media">
                                                    <i class="fa fa-check icon-sm text-primary align-self-center mr-3"></i>
                                                    <div class="media-body">
                                                        <h6 class="mb-1">Postpone project deadline</h6>
                                                        <p class="mb-0 text-muted">
                                                            Fix new release date
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card rounded border mb-2">
                                            <div class="card-body p-3">
                                                <div class="media">
                                                    <i class="fa fa-check icon-sm text-primary align-self-center mr-3"></i>
                                                    <div class="media-body">
                                                        <h6 class="mb-1">Upload the new update</h6>
                                                        <p class="mb-0 text-muted">
                                                            Submit the new build in play store
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card rounded border mb-2">
                                            <div class="card-body p-3">
                                                <div class="media">
                                                    <i class="fa fa-check icon-sm text-primary align-self-center mr-3"></i>
                                                    <div class="media-body">
                                                        <h6 class="mb-1">Book flight</h6>
                                                        <p class="mb-0 text-muted">
                                                            Book flight tickets
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="card-title">In progress</h6>
                                    <div id="dragula-event-right" class="py-2">
                                        <div class="card rounded border mb-2">
                                            <div class="card-body p-3">
                                                <div class="media">
                                                    <i class="fa fa-check icon-sm text-success align-self-center mr-3"></i>
                                                    <div class="media-body">
                                                        <h6 class="mb-1">Prohect details</h6>
                                                        <p class="mb-0 text-muted">
                                                            Get new project details from Greg
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card rounded border mb-2">
                                            <div class="card-body p-3">
                                                <div class="media">
                                                    <i class="fa fa-check icon-sm text-success align-self-center mr-3"></i>
                                                    <div class="media-body">
                                                        <h6 class="mb-1">Leave approval</h6>
                                                        <p class="mb-0 text-muted">
                                                            Approve leaves for Mike
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card rounded border mb-2">
                                            <div class="card-body p-3">
                                                <div class="media">
                                                    <i class="fa fa-check icon-sm text-success align-self-center mr-3"></i>
                                                    <div class="media-body">
                                                        <h6 class="mb-1">Make reservations at hotel</h6>
                                                        <p class="mb-0 text-muted">
                                                            Book rooms for vacation
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card rounded border mb-2">
                                            <div class="card-body p-3">
                                                <div class="media">
                                                    <i class="fa fa-check icon-sm text-success align-self-center mr-3"></i>
                                                    <div class="media-body">
                                                        <h6 class="mb-1">Meeting with client</h6>
                                                        <p class="mb-0 text-muted">
                                                            New project meeting
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
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
                delay:900,
                minlength:8,
                select:function (event,ui) {

                    $('#producto').val(ui.item.value);
                    $('#precio').val(ui.item.precio);


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
                delay:900,
                minlength:8,
                select:function (event,ui) {

                    $('#cliente').val(ui.item.value);

                    return false;
                }

            });
        });
    </script>
    @endsection