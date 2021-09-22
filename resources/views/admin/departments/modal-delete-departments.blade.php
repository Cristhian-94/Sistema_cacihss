<div class="modal fade" id="modal-delete-departament-{{$depto->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header bg-green">
                <img src="/images/logo.png" style="width: 75px" >
                <h2 class="modal-title text-dark  m-2" ><b>Borrar Departamento</b> </h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('admin.department.delete', $depto->id) }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name"> Desea borrar la Categoria:</label>
                         <h1><b>{{$depto->name}}</b></h1>
                    </div>
                </div>

                <div class="modal-footer justify-content-between bg-success ">
                    <form class="d-inline" action="{{ route('admin.department.delete', $depto->id) }}" method="POST" >
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-primary"> <i class="fas fa-check"></i> <b>Confirmar</b></button>
                    </form>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
