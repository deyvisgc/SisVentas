@extends('layouts.header')
@section('contenido')
    <!--  Made With Material Kit  -->
    <link href="{{asset('assets/css/material-bootstrap-wizard.css')}}" rel="stylesheet" />


    @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!--   Big container   -->

    <div class="container" style="padding-left: 100px">
        <div class="row">
            <div class="col-sm-11 col-sm-offset-2">
                <!--      Wizard container        -->
                <div class="wizard-container">
                    <div class="card wizard-card" data-color="green" id="wizardProfile">
                        {!! Form::open(array('url'=>'User/create','method'=>'Post','autocomplete'=>'off','files'=>true)) !!}
                          {{Form::token()}}
                            <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->

                            <div class="wizard-header">
                                <h3 class="wizard-title">
                                    REGISTROS DE USUARIOS
                                </h3>

                            </div>
                            <div class="wizard-navigation">
                                <ul>
                                    <li><a href="#about" data-toggle="tab">Datos de usuarios</a></li>
                                    <li><a href="#account" data-toggle="tab">Datos Personales</a></li>

                                </ul>
                            </div>

                            <div class="tab-content">
                                <div class="tab-pane" id="about">
                                    <div class="row">
                                        <div class="col-sm-4 col-sm-offset-1">
                                            <div class="picture-container">
                                                <div class="picture">
                                                    <img src="{{asset('assets/img/default-avatar.png')}}" class="picture-src" id="wizardPicturePreview" title=""/>
                                                    <input type="file" id="wizard-picture"  name="imagen">
                                                </div>
                                                <h6>Imagen</h6>
                                            </div>
                                        </div>
                            <div class="col-sm-6">
                                            <div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">face</i>
													</span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">email <small>(example@.com)</small></label>
                                          <input value="{{old('email')}}" name="email" required type="email"  class="form-control">
                                                </div>
                                            </div>

                                            <div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">record_voice_over</i>
													</span>
                                                <div class="form-group ">
                                                    <label class="control-label">Usuario<small>(Campo obligatorio)</small></label>
                                                    <input value="{{old('username')}}"  name="username" required="" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">record_voice_over</i>
													</span>
                                                <div class="form-group ">
                                                    <label class="control-label">Password<small>(Campo obligatorio)</small></label>
                                                    <input name="password" value="{{old('password')}}" required="" type="password" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane" id="account">
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                            <div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">record_voice_over</i>
													</span>
                                                <div class="form-group ">
                                                    <label class="control-label">nombre</label>
                                                    <input value="{{old('nombre')}}" name="nombre" required=""   type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">face</i>
													</span>
                                            <div class="form-group ">
                                                <label class="control-label">Apellido Paterno<small>(Campo obligatorio)</small></label>
                                                <input value="{{old('apellido_pa')}}"  name="apellido_pa" required type="text"  class="form-control">
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">record_voice_over</i>
													</span>
                                            <div class="form-group ">
                                                <label class="control-label">Apellido Materno<small>(Campo obligatorio)</small></label>
                                                <input  value="{{old('apellido_ma')}}" name="apellido_ma" required="" type="text" class="form-control">
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">record_voice_over</i>
													</span>
                                            <div class="form-group ">
                                                <label class="control-label">DNI <small>(Campo obligatorio)</small></label>
                                                <input value="{{old('dni')}}" name="dni" required="" type="number" class="form-control">
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                            <div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">record_voice_over</i>
													</span>
                                                <div class="form-group ">
                                                    <label class="control-label">DIRECCION<small>(Campo obligatorio)</small></label>
                                                    <input value="{{old('direccion')}}" name="direccion" required="" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                            <div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">record_voice_over</i>
													</span>
                                                <div class="form-group ">
                                                    <label class="control-label">TELFONO <small>(Campo obligatorio)</small></label>
                                                    <input name="telefono" required="" type="number" value="{{old('telefono')}}" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                            <label for="exampleInputEmail1">Fecha Cumpleaños<small>(Campo obligatorio)</small></label>
                                            <div class="input-group date"  data-provide="datepicker">
                                                <input type="text" value="{{old("Fecha_cumple")}}" name="Fecha_cumple"  id="date" class="form-control">
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-th"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-10 col-sm-offset-1">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Rol</label>
                                                <select name="rol" class="form-control" onreset="" >
                                                    <option value="" >Seleccione tu Rol</option>
                                                    @foreach($rol as $ro)
                                                        <option value="{{$ro->idroles}}">{{$ro->nombre_rol}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        </div>

                            </div>
                            <div class="wizard-footer">
                                <div class="pull-right">
                                    <input type='button' class='btn btn-next btn-fill btn-success btn-wd' name='Siguiente' value='Siguiente' />
                                    <input type='submit' class='btn btn-finish btn-fill btn-success btn-wd' name='Registrar' value='Registrar' />
                                </div>

                                <div class="pull-left">
                                    <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='Anterior' value='Anterior' />
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        {!! Form::close() !!}

                    </div>
                </div> <!-- wizard container -->
            </div>
        </div><!-- end row -->
    </div> <!--  big container -->
    </div>
    @endsection
