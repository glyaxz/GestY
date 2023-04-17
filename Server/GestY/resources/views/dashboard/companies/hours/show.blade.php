@extends('fragments.layout')
@section('content')
    <div class="c-client">

    </div>

    <div class="c-hours">
        {{--  --}}
    </div>

    <div class="c-buttons">
        @foreach ($projects as $c)
            <a href="{{ url("dashboard/horas/{$c['project_id']}/task") }}" class="btn btn-client"> {{ $c['project_name'] }} </a>
        @endforeach
    </div>
        {{-- {{ App\    Http\Resources\ClickupConnector::GetHoursFromClient($) }} --}}
@endsection
