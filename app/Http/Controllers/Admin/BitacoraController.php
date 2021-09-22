<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\bitacora;

class BitacoraController extends Controller
{
    public function index(){

        $bitacora = bitacora::orderBy('id','desc')->get();

        return view('admin.bitacora',['bitacora'=>$bitacora]);
    }
}
