<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\department;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','active']);
    }
    public function index(){

        $departaments =department::orderBy('name','asc')->get();
        $userid =user::all();
        return view('user.profil.perfil',['userid'=>$userid,'departments'=>$departaments]);
    }

    public function edit(){
        $userid= User::all();
        $departments= department::all();

        return view('user.profil.Perfil',['userid'=>$userid,'departments'=>$departments]);
    }

    public function profilupdate(Request $request){

        $user= Auth()->user();

        $data=$request->all();


        if($data['password'] !=null)
        $data['password']=bcrypt($data['password']);
        else
        unset($data['password']);

        $data['file'] = $user->file;

        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            if ($user->file) {
                $name=$user->file;
            } else
                $name=$user->id.$user->name;

                $extenstion=$request->file->extension();
                $nameFile="{$name}.{$extenstion}";
                $data['file']=$nameFile;

                $upload = $request->file->storeAs('users',$nameFile);




        }

        $update=$user->update($data);
        if($update)
        return redirect()->route('user.profil.edit')->with('success','Perfil Actualizado');
        else
        return redirect()->back()->withDanger('ha Fallado');









    }


}
