@extends('layouts.plantilla')

@section('title','Mis Tickets Enviados')

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
            <div>
                <a href="/create/tickets"><button type="button" class="btn btn-primary" >Crear Ticket </button></a>
            </div>
            <br>
            @if (session('dark'))
            <div class="alert-success text-dark  col-12" >
                <b>{{ session('dark') }}</b>
            </div>
            @endif
            @if (session()->has('danger'))
            <div class="alert-danger text-dark" >
                <b>{{ session()->get('danger') }}</b>
            </div>
            @endif
            @if (session()->has('warning'))
            <div class="alert-warning text-dark" >
                <b>{{ session()->get('warning') }}</b>
            </div>
            @endif
            <div class="card">
                <div class="card-header ">
                    <h3 class="card-title"> <b>Lista de Ticket Pendientes de Solución</b></h3>
                    <br>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="" class=" float-right">
                        <div class="form-row">
                            <div class="col my-1">
                                <input type="text"  class="form-control"  name="buscarpor" placeholder="Buscar por Nombre" value="{{$buscarpor}}"  >
                            </div>
                            <div class="col-auto my-1">

                                <button type="submit" class="btn btn-outline-dark"  ><i class="fas fa-search"></i>  </button>
                            </div>
                        </div>
                    </form>
                    <table id="tickets" class="table table-bordered table-striped  rounded rounded-3">
                    <thead class=" bg-primary rounded ">
                        <tr>
                            <th>No.</th>
                            <th>Nombre del Ticket</th>
                            <th>Categoria</th>
                            <th>Archivo</th>
                            <th>Fecha de Creación</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                        @if (count($tickets)<=0)
                            <tr>
                                <td colspan="6" >No hay Resultados</td>
                            </tr>
                        @else

                        @foreach ($tickets as $ticket)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $ticket->title }}</td>
                            <td>{{ $ticket->category->name }}</td>
                            <td >
                                <div>
                                    <a href="/user/download/{{ $ticket->file }}">Descargar</a>
                                </div>
                            </td>
                            <td>{{ $ticket->created_at->format('d-m-Y H:i a') }}</td>
                            <td>
                                <a href=" {{ route('user.ticket.show', $ticket->id) }}"  >

                                        <button class="btn btn-success d-inline" >
                                            <i class="fas fa-eye" > Ver </i></button>

                                </a>
                                <a href="{{ route('user.ticket.edit',$ticket->id) }}">
                                    <button  class="btn btn-warning d-inline "  >
                                        <i class="fas fa-edit text-white " > Editar</i>
                                    </button>
                                </a>

                                <button type="button" class="btn bg-danger d-inline" data-toggle="modal" data-target="#modaluser-delete-tickets{{ $ticket->id }}" >
                                <i class="fas fa-trash-alt" > Eliminar</i>
                                </button>
                            </td>
                        </tr>
                        <!-- modal - UPDATE CATEGORY -->

                        @include('user.Tickets.creacion.modaluser-delete-tickets')


                        <!-- /.modal -->

                    @endforeach
                    @endif
                    </table>
                    <br>
                    {{ $tickets->links()}}
                </div>
            <!-- /.card-body -->
        </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>

@stop
