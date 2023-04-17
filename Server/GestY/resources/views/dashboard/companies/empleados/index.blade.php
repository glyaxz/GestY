@extends('fragments.layout')

@section('content')
<div class="container mx-auto w-96 pb-4">
    <a href="{{ url('dashboard/empleados/exportpdf') }}" class="btn btn-pdf">Exportar Empleados</a>
    <a href="{{ url('dashboard/empleados/viewpdf') }}" class="btn btn-pdf">Visualizar Empleados</a>
</div>

    <div class="mb-4">
        {{ $empleados->links() }}
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>
                    ID
                </th>

                <th>
                    Nombre
                </th>

                <th>
                    Email
                </th>
                <th>
                    Horas
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($empleados as $e)
                <tr>
                    <td>
                        <a class="btn-hidden" href="{{ route('empleados.show', $e->id) }}">{{ $e->id }}</a>
                    </td>

                    <td>
                        <a class="btn-hidden" href="{{ route('empleados.show', $e->id) }}">{{ $e->nombre }}</a>
                    </td>

                    <td>
                        <a class="btn-hidden" href="{{ route('empleados.show', $e->id) }}">{{ $e->correo }}</a>
                    </td>

                    <td>
                        {{ $e->getHours() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
