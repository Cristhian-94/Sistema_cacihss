<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use App\Models\department;

class adminusercontroller extends Controller
{
    public function __construct(){

        $this->middleware(['auth','auth.admin']);
    }

    public function index(Request $request){



        $department=department::Orderby('name','asc')->get();


        $buscarpor=$request->get('buscarpor');
        $user=User::where('name','like','%'.$buscarpor.'%' )->where('status','=','active')->paginate(5);
        return view('admin.users.usuarios',['user'=>$user,'department'=>$department,'buscarpor'=>$buscarpor]);
    }

    public function update(Request $request ,$Id){

        $userdepto=user::find($Id);
        $userdepto->department_id=$request->department_id;
        $userdepto->role=$request->role;
        $userdepto->status=$request->status;


        $userdepto->save();

        return redirect()
        ->back()
       ->withWarning("Departamento de {$userdepto->name} actualizado con Exito");
    }
    public function delete(Request $request ,$userId){


        $user=user::find($userId);
       $user->delete();
        return redirect()
        ->back()
        ->withDanger(" {$user->name} Eliminado");
    }

    public function Registro(){

        $department=department::Orderby('name','asc')->get();
        $user=User::where('status','=','inactive')->get();
        


        return view('admin.users.solicitudes',['user'=>$user,'department'=>$department]);
    }




}
