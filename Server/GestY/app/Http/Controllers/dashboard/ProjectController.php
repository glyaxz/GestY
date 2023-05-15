<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\company\project\StoreRequest;
use App\Models\CProject;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Random;

class ProjectController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create(String $companyId)
    {
        return view('dashboard.companies.projects.create', compact('companyId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(StoreRequest $request, String $companyId)
    {
        $name = $request->input('project_name');
        $id = Random::generate(9, '0-9');
        $ref = Random::generate(6);

        $proj = DB::table('projects')->updateOrInsert([
            'project_id' => $id,
            'project_name' => $name,
            'company_id' => $companyId
        ]);

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CProject  $CProject
     */
    public function show(string $companyId, string $projectId)
    {
        $tasks = Task::query()->get()->where('project_id', $projectId);
        return view('dashboard.companies.projects.tasks.index', compact('tasks', 'projectId', 'companyId'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CProject  $CProject
     * @return \Illuminate\Http\Response
     */
    public function edit(CProject $CProject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CProject  $CProject
     */
    public function update(Request $request, CProject $CProject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CProject  $CProject
         */
    public function destroy(CProject $CProject)
    {
        //
    }

    public function getProjects(Request $request, String $companyId){
        //$companyId = $company->id;
        $projects = CProject::query()->from('projects')->get()->where('company_id', $companyId)->toArray();

        return view('dashboard.companies.projects.index', compact('companyId', 'projects'));
    }
}
