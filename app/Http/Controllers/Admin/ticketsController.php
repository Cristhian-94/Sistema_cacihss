<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Ticket;
use App\Models\User;




class ticketsController extends Controller
{
    public function __construct(){

        $this->middleware(['auth','auth.admin']);
    }
    public function post(){

        $total= Ticket::all();
        $countsolved=Ticket::whereNotNull('solution')->get();
        $countpendientes=Ticket::whereNULL('solution')->get();
        $user=User::all();
        $countsolicitudes=user::where('status','=','Inactive')->get();





        return view('admin.panel' ,['user'=>$user,'total'=>$total,'countsolved'=>$countsolved,'countpendientes'=>$countpendientes,'countsolicitudes'=>$countsolicitudes]);
    }


    public function index(Request $request){

        $buscarpor=$request->get('buscarpor');
        $tickets = Ticket::whereNull('solution')->orderBy('id','desc')->where('title','like','%'.$buscarpor.'%')->paginate(10);

        $categories=Category::all();
        //contadores
        $total= Ticket::all();
        $countsolved=Ticket::whereNotNull('solution')->get();
        $countpendientes=Ticket::whereNULL('solution')->get();

        return view('admin.tickets.index' , ['total'=>$total,'countsolved'=>$countsolved,'countpendientes'=>$countpendientes, 'tickets'=> $tickets , 'categories'=>$categories,'buscarpor'=>$buscarpor ] );

    }
    public function store(Request $request ){

        $newTicket = new Ticket();

        if($request->file('file')){
            $file=$request->file('file');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->file->move('storage/', $filename);

            $newTicket->file=$filename;
        }

        $newTicket->title=$request->title;
        $newTicket->category_id=$request->category_id;
        $newTicket->content=$request->content;
        $newTicket->author=$request->author;
        $newTicket->solution=$request->solution;
        $newTicket->save();


        return redirect()->back();
    }
    public function update(Request $request ,$ticketId){

        $ticket = Ticket::find($ticketId);

        $ticket->solution=$request->solution;
        if ($request->file('fileadmin')) {
            $file=$request->file('fileadmin');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->fileadmin->move('storage/', $filename);

            $ticket->fileadmin=$filename;
        }

        $ticket->save();


        return redirect()
        ->back()
        ->withWarning("TICKET {$ticket->title} Solucionado con Exito");
    }



    public function postByCategory($category){



        $categories=Category::all();
        $category=Category::where('name' ,'=' ,$category)->first();
        $categoryIdSelected=$category->id;

        $tickets= Ticket::where('category_id','=',$category->id)->get();

        return view('admin.tickets.tickets' ,[ 'tickets'=> $tickets ,
         'categories'=>$categories,
         'categoryIdSelected'=>$categoryIdSelected ]  );





    }

    public function solved(Request $request){
        $buscarpor=$request->get('buscarpor');
        $tickets = Ticket::whereNotNull('solution')->orderBy('id','desc')->where('title','like','%'.$buscarpor.'%')->paginate(10);
        $categories=Category::all();
        //contadores
        $total= Ticket::all();
        $countsolved=Ticket::whereNotNull('solution')->get();
        $countpendientes=Ticket::whereNULL('solution')->get();

        return view('admin.tickets.solved',['total'=>$total,'countsolved'=>$countsolved,'countpendientes'=>$countpendientes,'tickets'=> $tickets , 'categories'=>$categories,'buscarpor'=>$buscarpor]);
    }

    public function download($file){
        return response()->download('storage/'.$file);
    }



}
