@extends('layouts.plantillaadmin')

@section('title', 'Categorías')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fas fa-folder"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"> <b>Total Categorias</b></span>
                <span class="info-box-number">{{$countcategories->count()}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
    </div>
</div>


<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-category"> <b>Crear</b> </button>
            </div>
            <br>
            @if (session()->has('success'))
            <div class="alert-success text-dark  col-12" >
                <b>{{ session()->get('success') }}</b>
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
                <div class="card-header">
                    <h3 class="card-title text-black "> <b> Listado de categorías</b></h3>

                </div>
            <!-- /.card-header -->
            <div class="card-body">

                    <table id="categories" class="table table-bordered">
                        <thead class="bg-primary text-dark ">
                            <tr>
                                <th>No.</th>
                                <th>Categoria</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <div>
                                        <button type="submit" class="btn btn-warning d-inline"  data-toggle="modal" data-target="#modal-update-category-{{$category->id}}" ><i class="fas fa-edit"> Editar </i></button>
                                         <button type="submit" class="btn btn-danger d-inline "  data-toggle="modal" data-target="#modal-delete-category-{{$category->id}}" ><i class="fas fa-trash"> Eliminar </i></button>
                                    </div>
                                </td>
                            </tr>
                             <!-- modal  departament -->

                             @include('admin.categories.modal-update-category')
                             @include('admin.categories.modal-delete-category')


                             <!-- /.modal -->

                            </tbody>
                            @endforeach
                        </table>
                    <br>
                    {{ $categories->links() }}
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
<div class="modal fade" id="modal-create-category">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header bg-success ">
                <img src="/images/logo.png" style="width: 75px" >
                <h1 class="modal-title text-dark  m-2" ><b>Crear Categorias</b> </h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{route('admin.categories.store')}}" method="POST" >
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Nombre:</label>
                        <input type="text" class="form-control " required name="name" id="category" >

                      
                        </div>

                    </div>

                    <div class="modal-footer justify-content-between bg-success">
                        <button type="submit" class="btn btn-primary"> <i class="fas fa-save" ></i> <b> Guardar</b></button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><b> Cancelar</b></button>
                    </div>
                </form>
            </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@stop




