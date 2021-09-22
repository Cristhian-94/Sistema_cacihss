@extends('layouts.plantillaadmin')

@section('title', 'Departamentos')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fas fa-folder"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"> <b>Total Departamentos</b></span>
                <span class="info-box-number">{{ $countdepartments->count()}}</span>
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
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-department"> <b>Crear</b> </button>

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
                    <h3 class="card-title text-black "> <b> Listado de Departamentos</b></h3>

                </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="department" class="table table-bordered">
                    <thead class="bg-primary text-dark ">
                        <tr>
                            <th>No.</th>
                            <th>Departamento</th>

                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($departments as $depto )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $depto->name }}</td>
                           
                            <td  >
                                <div>
                                    <button type="submit" class="btn btn-warning d-inline text-white "  data-toggle="modal" data-target="#modal-update-departament-{{$depto->id}}" ><i class="fas fa-edit"> Editar</i></button>
                                    <button type="submit" class="btn btn-danger d-inline  " data-toggle="modal" data-target="#modal-delete-departament-{{$depto->id}}" ><i class="fas fa-trash"> Eliminar</i></button>

                                </div>

                            </td>

                        </tr>
                         <!-- modal - UPDATE departament -->

                         @include('admin.departments.modal-create-departments')
                         @include('admin.departments.modal-update-departaments')
                         @include('admin.departments.modal-delete-departments')


                         <!-- /.modal -->

                        </tbody>
                        @endforeach
                    </table>
                    <br>
                    {{ $departments->links() }}

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


<!-- /.modal -->
@stop



