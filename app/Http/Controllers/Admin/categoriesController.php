<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class categoriesController extends Controller
{
    public function __construct(){

        $this->middleware(['auth','auth.admin']);
    }

    public function index(){

        $categories =Category::orderBy('name','asc')->paginate(10);
        $countcategories=Category::all();




        return view('admin.categories.index', ['categories' => $categories,'countcategories'=>$countcategories]);

    }
    public function store(Request $request ){


        $newCategory = new Category();
        $newCategory->name=$request->name;

        $newCategory->save();

        return redirect()
        ->back()
        ->withSuccess("Categoria Creada con Exito");
    }
    public function update(Request $request ,$categoryId){

        $category=Category::find($categoryId);
        $category->name=$request->name;
        $category->save();

        return redirect()
        ->back()
       ->withWarning("Categoria {$category->name} actualizado con Exito");
    }

    public function delete(Request $request ,$categoryId){


        $category=Category::find($categoryId);
       $category->delete();
        return redirect()
        ->back()
        ->withDanger("Categoria {$category->name} Eliminada");
    }






}
