<table class="table" class="text-align: center;">
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
                    {{ $f->id }}
                </td>

                <td>
                    {{ $f->empleado_id }}
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
