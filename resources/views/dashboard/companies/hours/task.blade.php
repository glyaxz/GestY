@extends('fragments.layout')
@section('content')
    <div class="c-task">{{ $task->name }}</div>
    <div class="c-taskInfo">
        <div class="ct-d">
            Descripción
        </div>
        <div class="ct-description">
            {{ $task->content }}
        </div>
    </div>
    <div class="cs">
        <div class="cs-title">
            Tareas
        </div>
        @foreach ($subtasks as $s)
            <div class="cs-name">
                {{ $s->name }}
            </div>
            <div class="cs-assigned">
                <div class="cs-empleados">
                    Empleados
                </div>
                @foreach ($s->assignees as $empleado)
                    <div class="cs-empleado">
                        - {{ $empleado->username }}
                    </div>
                @endforeach
            </div>
            {{-- <div class="cs-hours">
                {{ App\Http\Resources\ClickupConnector::getTimeFromSubtask($s->id) }}
            </div> --}}
        @endforeach
    </div>
@endsection
