@extends('fragments.layout')
@section('content')
    <div>
        {{ $empleado->id }}
    </div>
    <div>
        {{ $empleado->nombre }}
    </div>
    <div>
        {{ $empleado->correo }}
    </div>
@endsection
