@extends('fragments.layout')
@section('content')
<div class="container mx-auto flex justify-center pb-4 flex-wrap">
    <a href="{{ route('projects.create', $companyId ) }}" class="btn btn-pdf">Crear Proyecto</a>
</div>

<div class="c-buttons">
    @foreach ($projects as $project)
        <a href="{{ route('projects.show', [ 'company_id' => $companyId, 'project' => $project['id']]) }}" class="btn btn-company"> {{ $project['project_name'] }} </a>
    @endforeach
</div>
@endsection
