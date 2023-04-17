@extends('fragments.layout')
@section('content')
    @if(Auth::user()->isAdmin())
        <div class="container mx-auto flex justify-center pb-4 flex-wrap">
            <a href="{{ route('company.create') }}" class="btn btn-pdf">Crear Empresa</a>
        </div>
    @endif
    <div class="c-buttons">
        @foreach ($empresas as $c)
            <a href="" class="btn btn-company"> {{ $c->company_name }} </a>
        @endforeach
    </div>
@endsection
