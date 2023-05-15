<?php

namespace App\Http\Controllers;

use App\Http\Requests\Empleados\PutRequest;
use App\Models\Empleado;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index(int $companyId)
    {
        $all = Empleado::all();
        $empleados = Empleado::query()->get()->where('company_id', $companyId);
        echo view('dashboard.companies.empleados.index', compact('companyId', 'empleados'));

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Empleado $empleado)
    {
        return view('dashboard.empleados.show', compact('empleado'));
    }

    public function edit(Empleado $empleado)
    {
        //
    }

    public function update(PutRequest $request, Empleado $empleado)
    {
        //
    }

    public function destroy(Empleado $empleado)
    {
        //
    }

    public function getpdf(){
        $empleados = Empleado::get();
        $pdf = Pdf::loadView('dashboard.empleados.pdf', compact('empleados'));
        return $pdf->download('empleados_'.date('d-m-y'));
    }

    public function streampdf(){
        $empleados = Empleado::get();
        $pdf = Pdf::loadView('dashboard.empleados.pdf', compact('empleados'));
        return $pdf->stream();
    }

    public static function returnpdf(){
        $empleados = Empleado::get();
        $pdf = Pdf::loadView('dashboard.empleados.pdf', compact('empleados'));
        return $pdf;

    }
}
