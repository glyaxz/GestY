<?php

namespace App\Http\Controllers;

use App\Http\Requests\Fichajes\PutRequest;
use App\Http\Requests\Fichajes\StoreRequest;
use App\Models\Company;
use App\Models\Fichaje;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FichajesController extends Controller
{
    public function index(Company $company_id)
    {
        $companyRef = $company_id->company_ref;
        $fichajes = Fichaje::orderBy('entrada', 'desc')->paginate(600);
        return view('dashboard.fichajes.index', compact('fichajes'));

    }

    public function create()
    {
        //
    }

    public function store(StoreRequest $request)
    {
        $f = Fichaje::create([
            'empleado_id' => Auth::user()->empleado_id,
            'entrada' => Carbon::now('GMT+1')->toDateTime(),
            'ip' => $request->ip(),
            'terminal' => str_contains($request->userAgent(), 'Mobile') ? 'Movil':'PC',
            'script' => $request->userAgent(),
        ]);
        return redirect($request->session()->previousUrl());
    }

    public function show(Fichaje $fichaje)
    {
        return view('dashboard.fichajes.show', compact('fichaje'));
    }

    public function edit(Fichaje $fichaje)
    {
        //
    }

    public function update(PutRequest $request, Fichaje $fichaje)
    {
        $entrada = Fichaje::getMs($fichaje);
        $salida = Carbon::now('GMT+1')->toDateTime();
        $time = ($salida->getTimestamp() - $entrada);
        $f = [
            'salida' => $salida,
            'time' => abs($time),
        ];
        $fichaje->update($f);
        return redirect($request->session()->previousUrl());
    }

    public function destroy(Fichaje $fichaje)
    {
        //
    }

    public function getpdf(){
        $fichajes = Fichaje::orderBy('entrada', 'desc')->paginate(600);
        $pdf = Pdf::loadView('dashboard.fichajes.pdf', compact('fichajes'));
        return $pdf->download('fichajes_'.date('d-m-y'));
    }

    public function streampdf(){
        $fichajes = Fichaje::orderBy('entrada', 'desc')->paginate(600);
        $pdf = Pdf::loadView('dashboard.fichajes.pdf', compact('fichajes'));
        return $pdf->stream();
    }
    public static function returnpdf(){
        $fichajes = Fichaje::orderBy('entrada', 'desc')->paginate(600);
        $pdf = Pdf::loadView('dashboard.fichajes.pdf', compact('fichajes'));
        return $pdf;
    }


}
