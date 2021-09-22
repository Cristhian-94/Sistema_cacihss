<div class="modal fade" id="modaluser-solved-tickets-{{$ticket->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header bg-success">
                <img src="/images/logo.png" alt="" style="width: 95px">

                <h2 class="modal-title  text-dark m-3 p-2" > <b>Ticket {{ $ticket->title }}  </b></h2>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('user.tickets.update',$ticket->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label ><h4> <b>Nombre:<b class=" text-green" >{{$ticket->title}}</b></b></h4></label>
                    </div>
                    <div class="form-group">
                        <label ><h4> <b>Categoria:<b class=" text-green" >{{$ticket->category->name}}</b></b></h4></label>
                    </div>
                    <div class="form-group">
                        <h4><b>Descripción:</b></h4>
                        <h5> <b class="text-green" >{{$ticket->content}}</b></h5>
                    </div>
                   <div class="form-group">
                        <h4><b>Solucion:</b></h4>
                        <h5> <b class="text-green" >{{$ticket->solution}}</b></h5>
                    </div>
                     <a href="/user/download/{{ $ticket->fileadmin }}">Descargar</a>
                    <br>
                    <label class=" float-right" >Solucionado {{ $ticket->updated_at->diffForHumans() }} </label>
                </div>
                <div class="modal-footer justify-content-between bg-success">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

                </div>
            </form>
        </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
