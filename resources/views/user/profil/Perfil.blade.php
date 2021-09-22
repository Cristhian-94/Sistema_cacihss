@extends('layouts.plantilla')

@section('title','Perfil Usuario')



@section('content')

    <div class="container-fluid">
             <h1><b>Perfil de Usuario</b></h1>

            @if (session('success'))
            <div class="alert-success text-dark ">
                <b >{{session('success')}}</b>

            </div>

            @endif

                <div class="card">
                     <div class="card-body ">
                         <div class="card card-primary">
                            <div class="card-header">
                            <h3 class="card-title">Perfil</h3>
                            </div>
                     <form action=" {{ route('user.profil.update') }} " method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="row">
                         <div class="col-md-4">
                                <div class="card-body">
                                    <div class="form-group">
                                    <label >Nombre</label>
                                      <input type="text"  name="name" required class="form-control" id="name" value=" {{ Auth::user()->name }} " >
                                    </div>
                                    <div class="form-group">
                                    <label >Correo Electronico</label>
                                    <input type="email" name="email" required class="form-control" id="email"  value="{{ Auth::user()->email }}" >
                                    </div>
                                    <div class="form-group">
                                    <label >Tipo de Usuario</label>
                                    <input type="text" class="form-control" id="" readonly value="{{ Auth::user()->role }}" >
                                    </div>
                                  </div>
                        </div>
                        <div class="col-md-4">
                                 <div class="card-body">
                                    <div class="form-group">
                                        <label >Apellido:</label>
                                          <input type="text" class="form-control" name="last_name" id="last_name" value=" {{Auth::user()->last_name}} " >
                                    </div>
                                    <div class="form-group">
                                        <label > Confirmar Departamento <b class=" text-success" >{{ Auth::user()->department->name }}</b></label>
                                        <select class="form-control" required name="department_id" id="department_id">
                                            <option value="{{ Auth::user()->department->id }}"> {{ Auth::user()->department->name }}  </option>
                                            @foreach ($departments as $depto)
                                            <option value=" {{ $depto->id }}"> {{$depto->name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label > Nueva Contraseña</label>
                                        <input type="password" name="password" class="form-control" >
                                    </div>


                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card-body">
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
                                                <i class="fa fa-cloud-upload"></i> Subir Imagen
                                            </label >
                                            <input id="file-upload" type="file" disabled name="file" >
                                    </div>
                                    <div >
                                    @if (auth::user()->file != null)


                                    <img src="{{url('/storage/users/'.Auth()->user()->file) }}" alt=" {{ Auth::user()->name }} {{Auth::user()->last_name}} " style="width: 200px" >

                                    @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div>
                    <button type="submit" class="btn btn-success" >Actualizar</button>
                 </div>
                   </div>
                 </div>


    </div>
</form>



@endsection
