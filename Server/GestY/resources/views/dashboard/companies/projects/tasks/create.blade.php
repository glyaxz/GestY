@extends('fragments.layout')
@section('content')
<form action="{{ route('tasks.store',  ['company_id' => $companyId, 'project_id' => $projectId, 'task' => $task] ) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <table class="comp-create">
        <thead>
            <th>
                Nombre de Tarea
            </th>
            <th>
                Descripcion
            </th>
            <th>
                Asignado
            </th>
        </thead>
        <tbody class="view-data">
            <td>
                <input type="text" name="task_name" id="project_name">
                <input type="hidden" name="project_id" value="{{ $projectId }}">
            </td>
            <td>
                <input type="text" name="task_desc" id="project_name">
            </td>
            <td>
                <select name="empleado_id" id="asignee">
                    @foreach (\App\Models\Company::getEmpleados($companyId) as $e)
                        <option value="{{ $e['id'] }}">{{ $e['nombre'] }}</option>
                    @endforeach
                </select>
            </td>
        </tbody>
    </table>


    <div class="view-btns">
        <button class="btn btn-pdf" type="submit">Guardar</button>
    </div>
</form>
@endsection
