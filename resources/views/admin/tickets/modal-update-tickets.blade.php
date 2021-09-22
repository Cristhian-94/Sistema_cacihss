<div class="modal fade" id="modal-update-tickets-{{$ticket->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header bg-success">
                <img src="/images/logo.png" style="width: 75px" >
                <h1 class="modal-title text-dark  m-2" ><b> Solucion del Ticket </b> </h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('admin.tickets.update',$ticket->id) }}" method="POST" enctype="multipart/form-data" >
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <h6> <b>Enviado por:</b>  <b class="text-green" >{{$ticket->user->name}} {{$ticket->user->last_name}} </b></h6>

                    </div>
                    <div class="form-group">
                        <h4 > <b  class=""> Nombre del Ticket</b></h4>
                        <h5><b class="text-green" >{{$ticket->title}}</b></h5>
                    </div>
                    <div class="form-group">
                        <h4 > <b>Categoria</b></h4>
                        <h5><b class="text-green" >{{$ticket->category->name}} </b></h5>
                    </div>
                    <div class="form-group">
                        <h4 > <b>Descripción</b></h4>
                        <h5><b class="text-green" >{{$ticket->content}} </b></h5>
                    </div>
                    <div>

                    </div>
                    <div class="form-group">
                        <h4 > <b>Solucion</b></h4>
                        <textarea name="solution" id="solution" class="form-control border border-success" rows="3"> {{ $ticket->solution }} </textarea>
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
                            <input id="file-upload" type="file" name="fileadmin"  accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf" />
                    </div>
                </div>

                <div class="modal-footer justify-content-between  bg-success">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> <b>Guardar</b></button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Cancelar</b></button>
                </div>
            </form>
        </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
