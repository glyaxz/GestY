@extends('fragments.layout')
@section('content')
<form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <table class="comp-create">
        <thead>
            <th>
                Nombre de Empresa
            </th>
        </thead>
        <tbody class="view-data">
            <td>
                <input type="text" name="company_name" id="company_name">
            </td>
        </tbody>
    </table>


    <div class="view-btns">
        <button class="btn btn-pdf" type="submit">Guardar</button>
    </div>
</form>
@endsection
