<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClickupConnector;
use App\Models\ClickupClient;
use App\Models\ClickupEmpleado;
use App\Models\ClickupList;
use App\Models\ClickupProject;
use App\Models\ClickupTask;
use FontLib\TrueType\Collection;
use Illuminate\Http\Request;
use PHPUnit\TestRunner\TestResult\Collector;

class ClickupController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = ClickupProject::all()->toArray();
        foreach($clients as $c){
            ClickupConnector::getTasks($c['project_id']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //Objects
    public static function getClients(){
        $clients = ClickupClient::all();
        return $clients;
    }

    public static function getClient($clientId){
        $client = ClickupClient::query()->where('client_id', $clientId);
        return $client;
    }

    public static function getProjects($clientId){
        $projects = ClickupProject::query()->get()->where('client_id', $clientId)->toArray();
        return $projects;
    }

    public static function getProject($projectId){
        $project = ClickupProject::query()->where('project_id', $projectId);
        return $project;
    }

    public static function getLists($projectId){
        $lists = ClickupList::query()->get()->where('project_id', $projectId)->toArray();
        return $lists;
    }

    public static function getList($listId){
        $list = ClickupList::query()->where('list_id', $listId);
        return $list;
    }

    public static function getTasks(ClickupList $list){
        return $list->tasks();
    }

    public static function getTask($taskId){
        $task = ClickupTask::query()->where('task_id', $taskId);
        return $task;
    }

    //Empleados
    public static function getEmpleados(){
        $empleados = ClickupEmpleado::all();
        return $empleados;
    }

    public static function getEmpleado($empleadoId){
        $empleado = ClickupEmpleado::query()->where('empleado_id', $empleadoId);
        return $empleado;
    }

    //Hours
    public static function getTimeFromClient($client){
        $time = ClickupClient::query()->get('time_spent')->where('client_id', $client);
        return $time;
    }

    public static function getTimeFromProject($project){
        $time = ClickupProject::query()->get('time_spent')->where('project_id', $project);
        return $time;
    }

    public static function getTimeFromList($list){
        $time = ClickupList::query()->get('time_spent')->where('list_id', $list);
        return $time;
    }

    public static function getTimeFromTask($task){
        $time = ClickupTask::query()->get('time_spent')->where('task_id', $task);
        return $time;
    }

    public static function getTimeFromEmpleado($empleado){
        $time = ClickupEmpleado::query()->get('time_spent')->where('empleado_id', $empleado);
        return $time;
    }

}
