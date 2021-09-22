<div class="modal fade" id="modal-update-user-{{ $itemuser->id }}">
    <div class="modal-dialog border-red">
        <div class="modal-content bg-grey">
            <div class="modal-header  bg-green">
                <img src="/images/logo.png" alt="" style="width: 75px">
                    <h2 class="modal-title text-dark m-2" > <b> Editar  Usuario </b>  </h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('admin.user.update', $itemuser->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input type="text" readonly  name="title" class="form-control border-success"  id="ticket" value="{{$itemuser->name}} {{ $itemuser->last_name }} ">
                    </div>
                    <div class="form-group">
                        <label for="name">Correo Electronico:</label>
                        <input type="text" readonly  name="title" class="form-control border-success"  id="ticket" value="{{$itemuser->email}}">
                    </div>
                    <div>
                        <label >Departamento Asignado</label>
                        <select name="department_id" id="department_id" class="form-control" required >
                            <option value="{{$itemuser->department->id}}"> {{ $itemuser->department->name }} </option>
                        @foreach ($department as $department)
                        <option value=" {{ $department->id }} "> {{$department->name}} </option>
                        @endforeach
                    </select>
                    </div>
                    <div class="mt-1" >
                        <label >Rol</label>
                        <select class="form-control"  name="role" id="rol" required>
                            <option value="{{ $itemuser->role }} ">{{ $itemuser->role }} </option>
                           <option value="Administrador">Administrador</option>
                           <option value="Usuario">Usuario</option>

                        </select>
                    </div>
                    <div class="mt-1" >
                        <label >Estado</label>
                        <select class="form-control"  name="status" id="" required>
                            <option value="{{ $itemuser->status }} ">{{ $itemuser->status }} </option>
                           <option value="Active">Active</option>
                           <option value="Inactive">Inactive</option>

                        </select>
                    </div>






                </div>

                <div class="modal-footer justify-content-between bg-success">
                    <button type="submit" class="btn btn-primary "> <i class="fas fa-save"></i> <b>Guardar</b></button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Cancelar</b></button>
                </div>
            </form>
        </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
