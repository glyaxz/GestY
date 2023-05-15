@extends('fragments.layout')

@section('content')
@if (!\App\Models\Empleado::isEmpty($empleados))
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
            </tr>
        </thead>
        <tbody>
                @foreach ($empleados as $e)
                    <tr>
                        <td>
                            {{ $e->id }}
                        </td>

                        <td>
                            {{ $e->nombre }}
                        </td>

                        <td>
                            {{ $e->correo }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <div>
                No tienes empleados
            </div>
        @endif
@endsection
