<?php

namespace App\Http\Controllers\api;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CList;
use App\Models\CProject;
use App\Models\Empleado;
use App\Models\Task;
use ErrorException;
use Illuminate\Support\Facades\Log;

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
        Log::channel('daily')->info($ref);
        $logged = $request->get('email');
        Log::channel('daily')->info($logged);
        $company = Company::query()->get()->where('company_ref', $ref)->first()->getModel();
        Log::channel('daily')->info($company);
        $user = Empleado::query()->get()->where('correo', $logged)->first()->getModel();
        Log::channel('daily')->info($user);
        $user->update(['company_id' => $company->id]);
        return $company ?? null;
    }

    public function getCompanies(){
        $company = Company::all();

        return $company ?? null;
    }

    public function getProjects(Request $request){
        $companyId = $request->get('company_id');
        try{
            $company = Company::query()->get()->where('company_id', $companyId)->first();
            $projects = CProject::query()->from('projects')->get()->where('company_id', $company->id);
            return $projects ?? null;
        }catch(ErrorException){
            return null;
        }

    }


    public function getTasks(Request $request){
        $projectId = $request->get('project_id');
        try{
            $project = CProject::query()->from('projects')->get()->where('project_id', $projectId)->first();
            $tasks = Task::query()->get()->where('project_id', $project->id);
            return $tasks;
        }catch(ErrorException){
            return null;
        }

    }
}
