@extends('fragments.layout')
@section('content')
<div>
    {{ $Task->task_name }}
</div>

<div>
    {{ $Task->task_desc }}
</div>

<div>
    {{ $Task->empleado_id }}
</div>


@endsection
