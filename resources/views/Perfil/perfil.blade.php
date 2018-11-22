@extends('layouts.header')
@section('contenido')
    @include('Perfil.updatePer')
    @if (Session::has('message'))
        <div class="text-danger">
            {{Session::get('message')}}
        </div>
    @endif

    @if (Session::has('status'))
        <hr />
        <div class='text-success'>
            {{Session::get('status')}}
        </div>
        <hr />
    @endif
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    Perfil de Usuario
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="border-bottom text-center pb-4">
                                        <img src="{{asset('Imagenes/Usuario/'.$user->imagen)}}" alt="profile" class="img-lg rounded-circle mb-3"/>
                                        <p>Bienvenidos al sistema de Ventas de la empresa Rolast</p>
                                        <div class="d-flex justify-content-between">
                                            <a data-target="#modal-update-{{$user->id}}" data-toggle="modal">
                                                <button type="button" class="btn btn-outline-success">Actualizar Usuario</button>
                                            </a>
                                            <a data-target="#modal-editPersona-{{$user->idpersona}}" data-toggle="modal">
                                                <button class="btn btn-outline-warning">Actualizar Perfil</button>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="border-bottom py-4">

                                    </div>
                                    <div class="py-4">
                                        <p class="clearfix">
                                     <span class="float-left">
                                             Correo
                                           </span>
                                            <span class="float-right text-muted">
                                                     {{$user->email}}
                                                 </span>
                                                  </p>
                                                       <p class="clearfix">
                                                          <span class="float-left">
                                                             Usuario
                                                           </span>
                                            <span class="float-right text-muted">
                                                              {{$user->nombre_rol}}
                                                            </span>
                                                                </p>
                                                         <p class="clearfix">
                                                   <span class="float-left">
                                                         DNI
                                                         </span>
                                            <span class="float-right text-muted">
                                                       {{$user->dni}}
                                                         </span>
                                                           </p>
                                        <p class="clearfix">
                          <span class="float-left">
                            Telefono
                          </span>
                                            <span class="float-right text-muted">
                           {{$user->telefono}}
                          </span>
                                        </p>
                                        <p class="clearfix">
                          <span class="float-left">
                            Direccion
                          </span>
                                            <span class="float-right text-muted">
                            <label>{{$user->Direccion}}</label>
                          </span>
                                        </p>
                                        <p class="clearfix">
                          <span class="float-left">
                            Fecha de Nacimiento
                          </span>
                                            <span class="float-right text-muted">
                           {{$user->Fecha_nacimiento }}
                          </span>
                                        </p>
                                    </div>
                                    <button class="btn btn-primary btn-block">Perfil</button>
                                </div>
                                @include('Perfil.updaUser')
                                <div class="col-lg-8 pl-lg-5">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h3>{{$user->nombre}} {{$user->Apellido_Pater}} {{$user->Apellido_Mater}}</h3>

                                        </div>
                                    </div>
                                    <div class="profile-feed">
                                        <div class="d-flex align-items-start profile-feed-item">
                                            <img  src="{{asset('Imagenes/Usuario/'.$user->imagen)}}"  alt="profile" class="img-sm rounded-circle"/>
                                            <div class="ml-4">
                                                <h6>
                                                 Deyvis Garcia
                                                    <small class="ml-4 text-muted"><i class="far fa-clock mr-1"></i>10 hours</small>
                                                </h6>
                                                <img src="../../images/samples/1280x768/12.jpg" alt="sample" class="rounded mw-100"/>
                                                <p class="small text-muted mt-2 mb-0">
                              <span>
                                <i class="fa fa-star mr-1"></i>4
                              </span>
                                                    <span class="ml-2">
                                <i class="fa fa-comment mr-1"></i>11
                              </span>
                                                    <span class="ml-2">
                                <i class="fa fa-mail-reply"></i>
                              </span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-start profile-feed-item">
                                            <img src="../../images/faces/face19.html" alt="profile" class="img-sm rounded-circle"/>
                                            <div class="ml-4">
                                                <h6>
                                                    Dylan Silva
                                                    <small class="ml-4 text-muted"><i class="far fa-clock mr-1"></i>10 hours</small>
                                                </h6>
                                                <p>
                                                    When I first got into the online advertising business, I was looking for the magical combination
                                                    that would put my website into the top search engine rankings
                                                </p>
                                                <img src="../../images/samples/1280x768/5.jpg" alt="sample" class="rounded mw-100"/>
                                                <p class="small text-muted mt-2 mb-0">
                              <span>
                                <i class="fa fa-star mr-1"></i>4
                              </span>
                                                    <span class="ml-2">
                                <i class="fa fa-comment mr-1"></i>11
                              </span>
                                                    <span class="ml-2">
                                <i class="fa fa-mail-reply"></i>
                              </span>
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
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="https://www.urbanui.com/" target="_blank"></a>. All rights reserved.</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">SYS | VENTAS Version 1.0 <i class="far fa-heart text-danger"></i></span>
            </div>
        </footer>
    </div>
    @endsection