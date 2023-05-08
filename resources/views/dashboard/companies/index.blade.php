@extends('fragments.layout')
@section('content')
    @if(Auth::user()->isAdmin())
        <div class="container mx-auto flex justify-center pb-4 flex-wrap">
            <a href="{{ route('company.create') }}" class="btn btn-pdf">Crear Empresa</a>
        </div>
    @endif
    @if(Auth::user()->isAdmin())
        <div class="c-buttons">
        @foreach ($empresas as $c)
                <a href="{{ route('company.show', $c) }}" class="btn btn-company"> {{ $c->company_name }} </a>
        @endforeach
    @else
        <div class="c-button">
            <a href="{{ route('company.show', $empresas) }}" class="btn btn-company"> {{ $empresas->company_name }} </a>
    @endif
    </div>
@endsection
