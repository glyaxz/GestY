@extends('fragments.layout')
@section('content')
<table class="table">
    <thead>
        <th>
            Identificador
        </th>
        <th>
            Nombre de Empresa
        </th>
        <th>
            Código de referencia
        </th>
        <th>
            Acciones
        </th>
    </thead>
    <tbody class="view-data">
        <td>
            {{$company->company_id}}
        </td>
        <td>
            {{$company->company_name}}
        </td>
        <td>
            {{$company->company_ref}}
        </td>
        <td>
            <div class="flex justify-center">
                <form action="{{ route('projects.projects', $company->id) }}" method="post">
                    @csrf
                    <button type="submit" class="btn-action btn-view">Ver Projectos</button>
                </form>
                @csrf
                <a href="{{ route('empleados.index', $company->id) }}" class="btn-action btn-view">Ver Empleados</a>
            </div>
        </td>
    </tbody>
</table>
@endsection
