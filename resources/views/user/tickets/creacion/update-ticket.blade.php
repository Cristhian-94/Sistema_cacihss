@extends('layouts.plantilla')

@section('title','Creación de Tickets')


@section('content')

    <div class="container-fluid">
             <h1><b>Edición de Ticket</b></h1>
        <div class="card">
            <div class="card-header bg-primary">
                <b>Editar Ticket</b>
            </div>
                <div class="card-body">
                    <form action="{{route('user.tickets.update',$ticket->id)}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                          <div class="form-group">
                              <label >Nombre del Ticket</label>
                              <input class="form-control border border-success" maxlength="25" minlength="5" required style="width: 30%" type="text" placeholder="Nombre del Ticket" name="title" value="{{ $ticket->title }}" >
                          </div>
                          <div class="form-group">
                              <label >Categoria</label>
                                <select name="category_id"  required class="form-control border-success " style="width:30%"  >
                                    <option value=" {{ $ticket->category_id }} ">{{ $ticket->category->name  }}</option>
                                    @foreach ($category as $category)
                                    <option value=" {{ $category->id }} "> {{ $category->name }} </option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group" >
                                <label >Descripción</label>
                                <textarea name="content" required maxlength="255" minlength="20" class="form-control border-success"  rows="5" placeholder="Descripción del Ticket" style="width:70%" > {{$ticket->content}}</textarea>
                            </div>

                            <div class="form-group" >
                                <style>
                                    input[type="file"] {
                                            display: none;
                                        }
                                        .custom-file-upload {
                                                border: 1px solid #ccc;
                                                    display: inline-block;
                                                        padding: 6px 12px;
                                                            cursor: pointer;
                                                        }
                                                                                </style>

                                <label for="file-upload" class="custom-file-upload">
                                        <i class="fa fa-cloud-upload"></i> Subir archivo
                                    </label>
                                    <input id="file-upload" type="file" name="file" />
                            </div>
                                <hr>
                                <button type="submit" class="btn btn-success" >Actualizar Ticket</button>
                                <a href="{{ route('user.tickets.index') }}" class="btn btn-danger float-right " > Cancelar </a>
                            </div>
                        </form>
                       </div>
            </div>




@endsection
