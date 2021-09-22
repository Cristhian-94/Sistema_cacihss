@extends('layouts.plantillaadmin')

@section('title','Tickets Solucionados')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fas fa-envelope"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"> <b>Tickets Recibidos</b></span>
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
                    <h1 class="card-title p-0"> <b>Lista de Tickets Solucionados</b></h1>



                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <a href="{{ route('descargarPDF') }}"  target="_blank" class="btn btn-primary"><i class="fas fa-download"></i> <b>Reporte</b></a>
                    <a href="{{ route('descargarPDFDepartment') }}"  target="_blank" class="btn btn-success"><i class="fas fa-download"></i> <b>Reporte Por Departamento</b></a>
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
                    <table id="categories" class="table table-bordered table-striped ">
                    <thead class="bg-primary ">
                        <tr>
                            <th>No.</th>
                            <th>Nombre</th>
                            <th>Enviado Por:</th>
                            <th>Categoria</th>
                            <th>Archivo Recibido</th>
                            <th>Archivo Enviado</th>
                            <th>Solucionado</th>
                            <th>Acciones</th>

                        </tr>
                    </thead>
                    <tbody class="border-2 border-black">
                        @if (count($tickets)<=0)
                        <tr>
                            <td colspan="7" > No hay Resultados </td>
                        </tr>


                        @else


                        @foreach ($tickets as $ticket)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $ticket->title }}</td>
                            <td>{{ $ticket->user->name}}</td>
                            <td>{{ $ticket->category->name }}</td>
                            <td >
                                <div>
                                    <a href="/files/download/{{ $ticket->file }}">Descargar</a>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <a href="/files/download/{{ $ticket->fileadmin }}">Descargar</a>
                                </div>
                            </td>
                            <td>{{ $ticket->updated_at->format('d-m-Y H:i a') }}</td>



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

<!-- modal -->
<div class="modal fade" id="modal-create-ticket">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <img src="/images/logo.png" alt="" style="width: 75px">
                <h1 class="modal-title text-center "><b>Crear Ticket </b></h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{route('admin.tickets.store')}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                        <label for="">Nombre Del Ticket</label>
                        <input type="text" class="form-control" required name="title" id="title" >
                        </div>
                        <div class="form-group">
                        <Label >Categoria</Label>
                        <select name="category_id" id="category_id" required class="form-control" >
                            <option value="">--Elegir una Categoria--</option>
                            @foreach ($categories as $category)
                            <option value=" {{ $category->id }} ">{{ $category->name }}</option>

                            @endforeach
                        </select>
                        </div>
                        <div class="form-group">
                        <Label>Descripción</Label>
                        <textarea rows="3" class="form-control" required name="content" id="ticket" ></textarea>
                        </div>
                        <div class="form-group">
                            <label >Author</label>

                        <input type="text" class="form-control" value="{{ Auth::user()->name }}" readonly  name="author" id="author" >
                        </div>
                        <div>
                        <input type="file" name="file">
                        </div>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-outline-success">Guardar</button>
                    </div>
                </form>
            </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@stop



