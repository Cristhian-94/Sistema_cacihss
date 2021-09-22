<div class="modal fade" id="modal-update-departament-{{$depto->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header bg-green">
                <img src="/images/logo.png" style="width: 75px" >
                <h2 class="modal-title text-dark  m-2" ><b>Editar Departamento</b> </h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('admin.departments.update', $depto->id) }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input type="text" name="name" class="form-control" required id="department" value="{{$depto->name}}">
                    </div>
                </div>

                <div class="modal-footer justify-content-between bg-success ">
                    <button type="submit" class="btn btn-primary"> <i class="fas fa-save"></i> <b>Guardar</b></button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Cancelar</b></button>
                </div>
            </form>
        </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
