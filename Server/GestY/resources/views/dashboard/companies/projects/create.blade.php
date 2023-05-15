@extends('fragments.layout')
@section('content')
<form action="{{ route('projects.store', $companyId) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <table class="comp-create">
        <thead>
            <th>
                Nombre de Proyecto
            </th>
        </thead>
        <tbody class="view-data">
            <td>
                <input type="text" name="project_name" id="project_name">
            </td>
        </tbody>
    </table>


    <div class="view-btns">
        <button class="btn btn-pdf" type="submit">Guardar</button>
    </div>
</form>
@endsection
