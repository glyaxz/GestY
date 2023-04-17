@extends('fragments.layout')

@section('content')

    <div class="c-hours">
        {{--  --}}
    </div>
   <div class="c-buttons">
    @foreach ($tasks as $c)
        <a href="{{ url("dashboard/horas/{$c['project_id']}/task/{$c['list_id']}") }}" class="btn btn-client"> {{ $c['list_name'] }} </a>
    @endforeach
   </div>
@endsection
