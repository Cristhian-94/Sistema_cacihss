<div class="modal fade" id="modaluser-update-tickets{{$ticket->id}}">
    <div class="modal-dialog border-red">
        <div class="modal-content bg-grey">
            <div class="modal-header  bg-green">
                <img src="/images/logo.png" alt="" style="width: 75px">


                    <h1 class="modal-title text-dark m-3" > <b> Editar Ticket </b>  </h1>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('user.tickets.update',$ticket->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input type="text"  name="title" class="form-control border-success"  id="ticket" value="{{$ticket->title}}">
                    </div>
                    <div class="form-group">
                        <Label >Categoria:</Label>
                        <select name="category_id"  id="category_id" required class="form-control border border-success" >
                            <option value="">{{ $ticket->category->name }}</option>
                            @foreach ($categories as $category)
                            <option value=" {{ $category->id }} ">{{ $category->name }}</option>

                            @endforeach
                        </select>
                        </div>
                    <div class="form-group">
                        <label for="name">Descripción:</label>
                     <textarea name="content"  id="content" class="form-control border border-success text-black"rows="4"> {{$ticket->content}}</textarea>
                    </div>

                    <div>
                        <input type="file" name="file"  accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf">
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
