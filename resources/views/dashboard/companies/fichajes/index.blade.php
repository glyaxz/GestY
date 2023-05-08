@extends('fragments.layout')

@section('content')
    @if(Auth::user()->isAdmin())
        <div class="container mx-auto w-96 pb-4">
            <a href="{{ url('dashboard/fichajes/exportpdf') }}" class="btn btn-pdf">Exportar Fichajes</a>
            <a href="{{ url('dashboard/fichajes/viewpdf') }}" class="btn btn-pdf">Visualizar Fichajes</a>
        </div>
    @endif
    <div class="mb-2 w-auto">
        {{ $fichajes->links() }}
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>
                    ID
                </th>

                <th>
                    Emp.
                </th>

                <th>
                    Entrada
                </th>

                <th>
                    Salida
                </th>

                <th>
                    IP
                </th>

                <th>
                    Term.
                </th>

                <th>
                    Script
                </th>

                <th>
                    Tiempo
                </th>
            </tr>
        </thead>
        <tbody class="fichajes">
            @foreach ($fichajes as $f)
                <tr>
                    <td>
                        <a class="btn-hidden" href="{{ route('fichajes.show', $f->id)}}">{{ $f->id }}</a>
                    </td>

                    <td>
                        <a class="btn-hidden" href="{{ route('empleados.show', $f->empleado()->id) }}">{{ $f->empleado_id }}</a>
                    </td>

                    <td>
                        {{ $f->entrada }}
                    </td>

                    <td>
                        {{ $f->salida }}
                    </td>

                    <td>
                        {{ $f->ip }}
                    </td>


                    <td>
                        {{ $f->terminal }}
                    </td>


                    <td>
                        {{ $f->script }}
                    </td>

                    <td>
                        {{ $f->getTime() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
