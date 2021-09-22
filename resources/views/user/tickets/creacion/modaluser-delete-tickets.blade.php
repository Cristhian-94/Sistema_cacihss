<div class="modal fade" id="modaluser-delete-tickets{{$ticket->id}}">
    <div class="modal-dialog border-red">
        <div class="modal-content bg-grey">
            <div class="modal-header  bg-green">
                <img src="/images/logo.png" alt="" style="width: 75px">


                    <h3 class="modal-title text-dark m-3" > <b> Eliminación de Ticket </b>  </h3>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('user.ticket.delete',$ticket->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label > Desea Eliminar el Ticket:</label>
                         <h1><b>{{$ticket->title}}</b></h1>
                    </div>
                </div>

                <div class="modal-footer justify-content-between bg-success">
                    <form class="d-inline" action="{{route('user.ticket.delete', $ticket->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-primary"> <i class="fas fa-check"></i> <b>Confirmar</b> </button>
                    </form>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Cancelar</b></button>
                </form>
                </div>
        </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
