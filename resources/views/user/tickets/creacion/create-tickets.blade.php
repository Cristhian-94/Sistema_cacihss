@extends('layouts.plantilla')

@section('title','Creación de Tickets')


@section('content')

    <div class="container-fluid">
             <h1><b>Creacion de Tickets</b></h1>
        <div class="card">
            <div class="card-header bg-primary">
                <b>Nuevo Ticket</b>
            </div>
                <div class="card-body">
                    <form action="{{route('user.tickets.store')}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                          <div class="form-group">
                              <label >Nombre del Ticket</label>
                              <input class="form-control border border-success" maxlength="50" minlength="5" required style="width: 30%" type="text" placeholder="Nombre del Ticket" name="title">
                          </div>
                          <div class="form-group">
                              <label >Categoria</label>
                                <select name="category_id"  required class="form-control border-success " style="width:30%"  >
                                    <option value="">Seleccionar Categoria del Ticket</option>
                                    @foreach ($category as $category)
                                    <option value=" {{ $category->id }} "> {{ $category->name }} </option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group" >
                                <label >Descripción</label>
                                <textarea name="content" required  class="form-control border-success" maxlength="255" minlength="25"   rows="5" placeholder="Descripción del Ticket" style="width:70%" ></textarea>
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
                                    <input id="file-upload" type="file" name="file"  accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf" />
                            </div>
                                <hr>
                                <button type="submit" class="btn btn-success" >Enviar Ticket</button>
                                <button  class="btn btn-danger "> <b> Cancelar</b> </button>
                            </div>
                        </form>
                       </div>
            </div>




@endsection
