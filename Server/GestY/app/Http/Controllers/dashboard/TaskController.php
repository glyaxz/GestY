<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Task;
use Nette\Utils\Random;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\company\project\task\StoreRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create(string $companyId, string $projectId, Task $task)
    {
        return view('dashboard.companies.projects.tasks.create', compact('companyId', 'projectId', 'task'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(StoreRequest $request, string $companyId, string $projectId)
    {
        $name = $request->input('task_name');
        $desc = $request->input('task_desc');
        $proj = $request->input('project_id');
        $emp = $request->input('empleado_id');
        $id = Random::generate(9, '0-9');

        $task = Task::create([
            'task_id' => $id,
            'task_name' => $name,
            'task_desc' => $desc,
            'project_id' => $proj,
            'empleado_id' => $emp,
        ]);

        $tasks = Task::query()->get()->where('project_id', $projectId);

        return view('dashboard.companies.projects.tasks.index', compact('companyId', 'projectId', 'tasks'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $Task
     */
    public function show(string $companyId, string $projectId, Task $Task)
    {
        return view('dashboard.companies.projects.tasks.show', compact('companyId', 'projectId', 'Task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $Task
     */
    public function edit(Task $Task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $Task
     */
    public function update(Request $request, Task $Task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $Task
     */
    public function destroy(Task $Task)
    {
        //
    }
}
