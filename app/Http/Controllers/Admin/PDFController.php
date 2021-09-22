<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\department;
use App\Models\ticket;
use App\Models\User;
use PDF;

class PDFController extends Controller
{
    public function __construct(){

        $this->middleware(['auth','auth.admin']);
    }

    public function PDFdepartment(){

        $ticketsdepto=Ticket::whereNotNull('solution')->get();


    $pdf= \PDF::loadView('admin.Reports.Reporte_Solucionado_Department',compact('ticketsdepto'));
    return $pdf->setPaper('a4', 'landscape')->stream('Reportes_Solucionado_Departamento.pdf');

    }

    public function PDFDetallado(){

        $tickets = Ticket::whereNotNull('solution')->get();


        $pdf=PDF::loadView('admin.reports.Reporte_solucionado',compact('tickets'));
        return $pdf->stream('Reporte_Solucionados.pdf');
    }



}
