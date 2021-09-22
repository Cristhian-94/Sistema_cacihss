@extends('layouts.plantilla')

@section('title','Vista de Tickets')


@section('content')

    <div class="container-fluid">
             <h1><b>Vista de Ticket</b></h1>
        <div class="card">
            <div class="card-header bg-primary">
                <b> Ticket Enviado</b>
            </div>
                <div class="card-body">
                    <form   >
                        @csrf
                          <div class="form-group">
                              <label class="text-danger" >Nombre del Ticket</label>
                              <h1><b>{{ $ticket->title }}</b></h1>
                            </div>
                            <div class="form-group">
                                <label class="text-danger" >Categoria</label>
                                <h1><b>{{ $ticket->category->name }}</b></h1>

                            </div>

                            <div class="form-group" >
                                <label class="text-danger" >Descripción</label>
                                <h3><b> {{ $ticket->content }} </b></h3>
                                </div>

                            <div class="form-group" >
                                <a href="/user/download/{{ $ticket->file }}">Descargar</a>
                            </div>
                                <hr>
                                <a  class="btn btn-danger" href="{{ route('user.tickets.index') }}" ><i class="fas fa-backward"> Regresar</i></a>

                            </div>
                        </form>
                       </div>
            </div>




@endsection
