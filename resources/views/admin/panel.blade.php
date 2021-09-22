@extends('layouts.plantillaadmin')

@section('title','Panel Administrador')

@section('content')
<div class="container-fluid">
    <h1><b>Usuarios</b> </h1>
    <div class="row">

        <div class="col-lg-3 col-6">
            <a href="/admin/usuarios">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h1 > {{ $user->count() }}</h1>
                <p>Usuarios</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
            </div>
        </a>

              <a href="/admin/register" class="small-box-footer text-dark">Ver <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <a href="/admin/register">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h1 > {{ $countsolicitudes->count() }}</h1>
                <p>Solicitudes de Registro</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="/admin/register" class="small-box-footer text-dark">Ver <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>

    </div>
        <div class="container-fluid">
        <h1><b>Tickets</b></h1>
        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                  <span class="info-box-icon bg-info"><i class="fas fa-envelope"></i></span>

                  <div class="info-box-content">
                      <span class="info-box-number">{{$total->count()}}</span>
                    <span class="info-box-text text-dark"> <b>Tickets Recibidos</b></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <div class="col-md-3 col-sm-6 col-12">
                <a href=" {{ route('admin.tickets.index') }} ">
                <div class="info-box">
                <span class="info-box-icon bg-dark"><i class="fas fa-clock"></i></span>

                <div class="info-box-content">
                    <span class="info-box-number">{{$countpendientes->count()}}</span>
                    <span class="info-box-text"> <b>Tickets Sin solucionar</b></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              </a>
              <!-- /.info-box -->
          </div>
            <div class="col-md-3 col-sm-6 col-12">
                <a href=" {{ route('admin.panel.solved') }} ">
                <div class="info-box">
                  <span class="info-box-icon bg-success"><i class="fas fa-check-double"></i></span>

                  <div class="info-box-content">
                      <span class="info-box-number">{{$countsolved->count()}}</span>
                    <span class="info-box-text"> <b>Tickets Solucionados</b></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                </a>
            </div>
            </div>
        </div>




@endsection
