<?php

namespace App\Http\Controllers\api;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Empleado;

class ClientController extends Controller
{
    public function checkRef(Request $request){
        $ref = $request->get('companyRef');
        $empresas = Company::query()->get(['company_ref', 'company_id', 'company_name'])->where('company_ref', $ref)->first();
        return $empresas ?? null;
    }

    public function checkUserRef(Request $request){
        $email = $request->get('email');
        $user = Empleado::query()->get()->where('correo', $email)->first();
        return $user ?? null;
    }

    public function setUserRef(Request $request){
        $ref = $request->get('company_ref');
        $company = Company::query()->get()->where('company_ref', $ref)->first();
        return $company ?? null;
    }
}
