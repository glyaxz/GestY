@extends('fragments.layout')
@section('content')
    <div class="c-buttons">
        @foreach ($clientes as $c)
            <a href="{{ route('horas.show', $c->client_id) }}" class="btn btn-client"> {{ $c->client_name }} </a>
        @endforeach
    </div>
@endsection
