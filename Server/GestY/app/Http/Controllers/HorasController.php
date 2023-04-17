<?php

namespace App\Http\Controllers;

use App\Http\Controllers\api\ClickupController;
use Illuminate\Http\Request;

class HorasController extends Controller
{
    public function index(){
        $clientes = ClickupController::getClients();
        return view('dashboard.hours.index', compact('clientes'));
    }

    public function show($clientId){
        $projects = ClickupController::getProjects($clientId);
        $client = ClickupController::getClient($clientId);
        return view('dashboard.hours.show', compact('projects', 'client'));
    }

    public function tasks($projectId){
        $tasks = ClickupController::getLists($projectId);
        return view('dashboard.hours.tasks', compact('tasks', 'projectId'));
    }

    public function task($projectId, $listId){
        $task = ClickupController::getList($listId);
        $subtasks = ClickupController::getTasks($listId);
        $hours = ClickupController::getTimeFromList($listId);
        return view('dashboard.hours.task', compact('task', 'subtasks', 'hours'));
    }
}
