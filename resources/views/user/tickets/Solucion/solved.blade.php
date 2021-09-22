@extends('layouts.plantilla')

@section('title','Mis Tickets Solucionados')

@section('content_header')

@stop
<!-- Tailwind CSS Link -->


@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fas fa-envelope"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"> <b>Total Tickets Enviados</b></span>
                <span class="info-box-number">{{$total->count()}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        <div class="col-md-3 col-sm-6 col-12">
            <a href="/home">
            <div class="info-box">
              <span class="info-box-icon bg-dark"><i class="fas fa-clock"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"> <b>Mis Tickets sin solucionar</b></span>
                <span class="info-box-number">{{$countpendientes->count()}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
        </a>
            <!-- /.info-box -->
          </div>
        <div class="col-md-3 col-sm-6 col-12">
            <a href="/user/tickets/solved">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fas fa-check"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"> <b>Mis Tickets Solucionados</b></span>
                <span class="info-box-number">{{$countsolved->count()}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            </a>
          </div>
        <div class="col-12">

            <br>
            <div class="card">
                <div class="card-header ">
                    <h3 class="card-title"> <b>Lista de Ticket Solucionados</b></h3>
                    <br>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="" class=" float-right">
                        <div class="form-row">
                            <div class="col my-1">
                                <input type="text"  class="form-control" name="buscarpor" placeholder="Buscar por Nombre" value=" {{ $buscarpor }}" >
                            </div>
                            <div class="col-auto my-1">

                                <button type="submit" class="btn btn-outline-dark" value="Buscar" ><i class="fas fa-search"></i>  </button>
                            </div>

                        </div>

                    </form>
                    <table id="solved" class="table table-bordered table-striped  ">
                    <thead class="bg-primary" style="color: black" >
                        <tr>
                            <th>No.</th>
                            <th>Nombre</th>
                            <th>Categoria</th>
                            <th>
                                Archivo
                            </th>

                            <th>Fecha de Creado</th>
                            <th>Fecha de Resolucion</th>
                            <th>Acciones</th>

                        </tr>
                    </thead>

                        @if (count($solved)<=0)
                        <tr>
                            <td colspan="6" > No hay Resultados </td>
                        </tr>
                          @else


                        @foreach ($solved as $ticket)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $ticket->title }}</td>
                            <td>{{ $ticket->category->name }}</td>
                            <td> <a href="/user/download/{{ $ticket->fileadmin }}">Descargar</a></td>
                            <td>{{ $ticket->created_at->format('d-m-Y   H:i a') }}</td>
                            <td>{{ $ticket->updated_at->format('d-m-Y   H:i a') }}</td>
                            <td >

                            <div>
                            <button type="submit" class="btn btn-success "  data-toggle="modal" data-target="#modaluser-solved-tickets-{{$ticket->id}}" ><i class="far fa-eye"> Ver </i></button>
                            </div>
                            </td>
                        </tr>
                         <!-- modal - UPDATE CATEGORY -->
                         @include('user.Tickets.Solucion.modaluser-solved-tickets')
                         <!-- /.modal -->

                        @endforeach
                        @endif



                </table>
                <br>
                {{$solved->links()}}

            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>

<!-- modal -->

@stop
