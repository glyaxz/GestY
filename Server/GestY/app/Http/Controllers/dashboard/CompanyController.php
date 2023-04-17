<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\company\StoreRequest;
use App\Models\Company;
use App\Models\User;
use FontLib\Table\Type\name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Nette\Utils\Random;

class CompanyController extends Controller
{
    public function index(User $user)
    {
        if(Auth::user()->isAdmin()){
            $empresas = Company::all();
            return view('dashboard.companies.index', compact('empresas'));
        }else{
            $empleado = $user->empleado();
            $empresas = Company::query()->get()->where('company_id', Auth::user()->empleado()->company_id);
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
        //
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
