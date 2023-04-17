@extends('fragments.layout')
@section('content')
    <div>
        {{ $fichaje->empleado()->nombre }}
    </div>
    <div>
        {{ $fichaje->entrada }}
    </div>
    <div>
        {{ $fichaje->salida }}
    </div>
    <div>
        {{ $fichaje->ip }}
    </div>
    <div>
        {{ $fichaje->script }}
    </div>
@endsection
