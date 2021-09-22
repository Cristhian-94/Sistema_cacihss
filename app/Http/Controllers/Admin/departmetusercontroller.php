<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\department;

class departmetusercontroller extends Controller
{
    public function __construct(){

        $this->middleware(['auth','auth.admin']);
    }
    public function index(){

        $departments = department::orderBy('name','asc')->paginate(10);
        $countdepartments= department::all();

        return view('admin.Departments.departamento',['departments'=>$departments,'countdepartments' => $countdepartments]);
    }

    public function store(Request $request){
        $newdepto = new department();
        $newdepto->name=$request->name;

        $newdepto->save();

        return redirect()->back()
        ->withSuccess("Departamento  Creado con Exito");

    }

    public function update(Request $request ,$departmentId){

        $department=department::find($departmentId);
        $department->name=$request->name;
        $department->save();

        return redirect()
        ->back()
        ->withWarning("Departamento {$department->name} actualizado con Exito");
    }
    public function delete(Request $request ,$departmentId){


        $department=department::find($departmentId);
        $department->delete();
        return redirect()
        ->back()
        ->withDanger("Departamento {$department->name} Eliminado");
    }


}

