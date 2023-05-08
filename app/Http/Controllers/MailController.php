<?php

namespace App\Http\Controllers;

use App\Models\Fichaje;
use Barryvdh\DomPDF\PDF;
use Mail;
use App\Mail\SendMail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function index(){
        $pdf = EmpleadoController::returnpdf();
        Mail::to('javiky03@gmail.com')->send(new SendMail($pdf));
        return to_route('empleados.index');
    }

    public static function sendmail($data){
        $pdf = FichajesController::returnpdf();
        Mail::to('javiky03@gmail.com')->send(new SendMail($pdf));
        return to_route('empleados.index');
    }


}
