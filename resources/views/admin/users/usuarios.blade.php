@extends('layouts.plantillaadmin')

@section('title','Usuarios' )

@section('content')

<div class="container-fluid">
    <div class="row">
            <div class="col-12">
                <h1> <b> Usuarios </b> </h1>
                <div class="card">
                    <div class="card-header bg-primary ">
                        <h3 class="card-title"> <b>Lista de Usuarios Registrados</b></h3>
                        <br>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="" class=" float-right">
                            <div class="form-row">
                                <div class="col my-1">
                                    <input type="text"  class="form-control" name="buscarpor" placeholder="Buscar por Nombre" value="{{$buscarpor}}"  >
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
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Departamento</th>
                                <th>Rol</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="border-2 border-black">
                            @if (count($user)<=0)
                            <tr>
                                <td colspan="5" >No hay Resultados</td>
                            </tr>
                            @else
                            @foreach ($user as $itemuser )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $itemuser->name }} {{ $itemuser->last_name  }} </td>
                                <td >{{ $itemuser->email }} </td>
                                <td> {{$itemuser->department->name}}</td>
                                <td> {{$itemuser->role}}</td>
                                <td>
                                <button type="button" class="btn btn-warning d-inline" data-toggle="modal" data-target="#modal-update-user-{{$itemuser->id}}" > <i class=" fas fa-edit" ></i> <b>editar</b></button>
                                {{-- <button type="submit" class="btn btn-danger d-inline "  data-toggle="modal" data-target="#modal-delete-user-{{$itemuser->id}}" ><i class="fas fa-trash"> Eliminar </i></button> --}}

                                </td>
                            </tr>
                            <!-- modal - UPDATE CATEGORY -->
                            @include('admin.users.modal-update-user')
                            @include('admin.users.modal-delete-user')
                            <!-- /.modal -->
                            @endforeach
                            @endif
                        </tbody>
                        </table>
                        <br>
                      {{ $user->links() }}


                    </div>
                <!-- /.card-body -->
            </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>


@endsection
