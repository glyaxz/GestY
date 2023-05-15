@extends('fragments.layout')
@section('content')
<div class="container mx-auto flex justify-center pb-4 flex-wrap">
    <a href="{{ route('tasks.create', [ 'company_id' => $companyId, 'project_id' => $projectId ]) }}" class="btn btn-pdf">Crear tarea</a>
</div>

<div class="c-buttons">
    @foreach ($tasks as $task)
        <a href="{{ route('tasks.show', [ 'company_id' => $companyId, 'project_id' => $projectId, 'task' => $task]) }}" class="btn btn-company"> {{ $task['task_name'] }} </a>
    @endforeach
</div>
@endsection
