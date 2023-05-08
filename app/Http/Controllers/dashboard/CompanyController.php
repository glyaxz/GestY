<?php

namespace App\Http\Controllers\dashboard;

use App\Models\User;
use App\Models\Company;
use Nette\Utils\Random;
use App\Models\Empleado;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\company\StoreRequest;

class CompanyController extends Controller
{
    public function index(User $user)
    {

        if(Auth::user()->isAdmin()){
            $empresas = Company::all();
            return view('dashboard.companies.index', compact('empresas'));
        }else{
            $empleado = Empleado::query()->get()->where('id', Auth::user()->empleado_id)->first();
            $empresas = Company::query()->get()->where('id', $empleado->company_id)->first();
            return view('dashboard.companies.index', compact('empresas'));
        }
    }

    public function create()
    {
        return view('dashboard.companies.create');
    }

    public function store(StoreRequest $request)
    {
        $name = $request->input('company_name');
        $id = Random::generate(9, '0-9');
        $ref = Random::generate(6);

        $comp = Company::create([
            'company_id' => $id,
            'company_name' => $name,
            'company_ref' => $ref
        ]);

        return to_route('company.index');

    }

    public function show(Company $company)
    {
        return view('dashboard.companies.show', compact('company'));
    }

    public function edit(Company $company)
    {
        //
    }

    public function update(Request $request, Company $company)
    {
        //
    }

    public function destroy(Company $company)
    {
        //
    }
}
