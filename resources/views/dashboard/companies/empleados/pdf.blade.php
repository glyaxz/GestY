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
