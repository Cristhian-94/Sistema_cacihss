<?php

namespace App\Http\Controllers\user;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\department;
use App\Models\Category;
use App\Models\Ticket;



class ticketUsercontroller extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','active']);
    }
    public function create()
    {
        $category=Category::OrderBy('name', 'asc')->get();

        return view('user.tickets.creacion.create-tickets', ['category'=>$category]);
    }
    public function show($id)
    {
        $ticket=Ticket::find($id);
        return view('user.tickets.show', ['ticket'=>$ticket]);
    }

    public function index(Request $request)
    {
        $buscarpor=$request->get('buscarpor');
        $tickets =Ticket::whereNULL('solution')->orderby('id', 'desc')->where('title', 'like', '%'.$buscarpor.'%')->where('user_id', '=', Auth::user()->id)->paginate(10);
        $solved= Ticket::whereNotNULL('solution')->orderby('id', 'desc')->get();
        //contadores
        $total= Ticket::all()->where('user_id', '=', Auth::user()->id);
        $countsolved=Ticket::whereNotNull('solution')->where('user_id', '=', Auth::user()->id);
        $countpendientes=Ticket::whereNULL('solution')->where('user_id', '=', Auth::user()->id);
        //categoria
        $categories=Category::orderBy('name', 'asc')->get();
        //vista
        return view('user.tickets.index', ['countpendientes'=>$countpendientes,'countsolved'=>$countsolved, 'tickets'=> $tickets , 'categories'=>$categories,'solved'=>$solved,'total' => $total,'buscarpor'=>$buscarpor]);
    }

    public function store(Request $request)
    {
        $newTicket = new Ticket();

        if ($request->file('file')) {
            $file=$request->file('file');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->file->move('storage/', $filename);

            $newTicket->file=$filename;
        }
        $newTicket->title=$request->title;
        $newTicket->category_id=$request->category_id;
        $newTicket->user_id = Auth::user()->id;
        $newTicket->content=$request->content;
        $newTicket->solution=$request->solution;
        $newTicket->save();


        return redirect()
        ->route('user.tickets.index')
        ->withDark("TICKET  Creado con Exito");
    }

    public function edit($ticketId)
    {
        $category=Category::orderBy('name', 'asc')->get();

        $ticket=Ticket::find($ticketId);
        return view('user.tickets.creacion.update-ticket', ['ticket'=>$ticket,'category'=>$category]);
    }
    public function update(Request $request, $ticketId)
    {
        $ticket = Ticket::find($ticketId);

        $ticket->title=$request->title;
        $ticket->category_id=$request->category_id;
        $ticket->content=$request->content;


        if ($request->file('file')) {
            $file=$request->file('file');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->file->move('storage/', $filename);

            $ticket->file=$filename;
        }
        $ticket->save();


        return redirect()
        ->route('user.tickets.index')
        ->withWarning("TICKET {$ticket->title} Actualizado con Exito");
    }
    public function solved(Request $request)
    {
        $buscarpor=$request->get('buscarpor');
        $tickets = Ticket::whereNULL('solution')->orderby('id', 'desc')->get();
        $solved= Ticket::whereNotNULL('solution')->orderby('id', 'desc')->where('title', 'like', '%'.$buscarpor.'%')->where('user_id', '=', Auth::user()->id)->paginate(10);
        //contadores
        $total= Ticket::all()->where('user_id', '=', Auth::user()->id);
        $countsolved=Ticket::whereNotNull('solution')->where('user_id', '=', Auth::user()->id);
        $countpendientes=Ticket::whereNULL('solution')->where('user_id', '=', Auth::user()->id);

        $categories=Category::all();
        return view('user.tickets.solucion.solved', ['countpendientes'=>$countpendientes,'countsolved'=>$countsolved,'tickets'=> $tickets , 'categories'=>$categories,'total'=>$total,'solved'=>$solved,'buscarpor'=>$buscarpor]);
    }

    public function download($file)
    {
        return response()->download('storage/'.$file);
    }

    public function delete(Request $request, $ticketId)
    {
        $ticket = Ticket::find($ticketId);
        $ticket->delete();

        return redirect()
        ->back()
        ->withDanger("TICKET {$ticket->title} Eliminado");
    }
}
