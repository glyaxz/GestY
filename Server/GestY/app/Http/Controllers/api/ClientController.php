<?php

namespace App\Http\Controllers\api;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    public function checkRef(Request $request){
        $ref = $request->get('companyRef');
        $empresas = Company::query()->get(['company_ref', 'company_id', 'company_name'])->where('company_ref', $ref)->first();
        $output = $empresas ?? null;
        return $output;
    }
}
