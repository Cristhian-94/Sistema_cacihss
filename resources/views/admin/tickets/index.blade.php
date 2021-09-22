@extends('layouts.plantillaadmin')

@section('title','Tickets Recibidos')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fas fa-envelope"></i></span>

              <div class="info-box-content">
                <span class="info-box-text text-dark"> <b>Tickets Recibidos</b></span>
                <span class="info-box-number">{{$total->count()}}</span>
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
              <span class="info-box-text"> <b>Tickets Sin solucionar</b></span>
              <span class="info-box-number">{{$countpendientes->count()}}</span>
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
                <span class="info-box-text"> <b>Tickets Solucionados</b></span>
                <span class="info-box-number">{{$countsolved->count()}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            </a>
          </div>

    </div>
</div>


<div class="container-fluid">
    @if (session()->has('warning'))
    <div class="alert-warning text-dark" >
        <b>{{ session()->get('warning') }}</b>
    </div>
    @endif
       <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header  ">
                    <h1 class="card-title p-0"> <b>Lista de Tickets Recibidos</b></h1>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="" class=" float-right">
                        <div class="form-row">
                            <div class="col my-1">
                                <input type="text"  class="form-control" name="buscarpor" placeholder="Buscar por Nombre"  value="{{$buscarpor}}" >
                            </div>
                            <div class="col-auto my-1">
                                <button type="submit" class="btn btn-outline-dark" value="Buscar" ><i class="fas fa-search"></i>  </button>
                            </div>
                        </div>
                    </form>
                    <table id="tickets" class="table table-bordered table-striped ">
                    <thead class="bg-primary ">
                        <tr>
                            <th>No.</th>
                            <th>Nombre</th>
                            <th>Enviado Por:</th>
                            <th>Categoria</th>
                            <th>Archivo Recibido </th>

                            <th> Fecha Recibido</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="border-2 border-black">
                        @if (count($tickets)<=0)
                        <tr>
                            <td colspan="7" >No hay Resultados</td>
                        </tr>
                        @else
                        @foreach ($tickets as $ticket)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $ticket->title }}</td>
                            <td>{{$ticket->user->name}} {{$ticket->user->last_name}}</td>
                            <td>{{ $ticket->category->name }}</td>
                            <td >
                                <div>
                                <a href="/files/download/{{ $ticket->file }}">Descargar</a>
                                </div>
                            </td>
                            
                            <td>{{ $ticket->created_at->format('d-m-Y H:i a') }}</td>
                            <td>
                                <div>
                                    <button type="submit" class="btn btn-success d-inline "  data-toggle="modal" data-target="#modal-update-tickets-{{$ticket->id}}" ><i class="fas fa-user-check"></i></button>
                        {{-- <form class="d-inline" action="{{ route('admin.ticket.delete', $ticket->id) }}" method="POST" >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" ><i class="fas fa-trash"></i></button>
                        </form> --}}
                                </div>
                            </td>
                        </tr>
                         <!-- modal - UPDATE CATEGORY -->
                         @include('admin.tickets.modal-update-tickets')
                         <!-- /.modal -->
                        </tbody>
                        @endforeach
                        @endif
                </table>
                <br>
                {{ $tickets->links() }}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

    <!-- /.col -->
</div>
<div>

</div>
<!-- /.row -->
</div>

<!-- /.modal -->
@stop




