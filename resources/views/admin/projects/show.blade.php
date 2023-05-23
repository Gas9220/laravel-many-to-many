@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <a href="{{ route('admin.projects.index') }}" class="btn btn-primary btn-sm me-2">Back</a>
            <h2 class="fs-4 text-secondary my-4">Project Details</h2>
            @if (session('message'))
                <div class="alert alert-success ms-auto p-2" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            <a href="{{ route('admin.projects.edit', $project->id) }}"
                class="btn btn-primary btn-sm me-2 ms-auto"><i class="bi bi-pencil-fill"></i></a>
        </div>
        <span class="badge text-bg-{{$project->type?->type_color()}} fs-5">{{ $project->type?->name ?: 'Nessun tag' }}</span>
        <h4>Project name: {{ $project->project_name }}</h4>
        @if (isset($project->project_image))
            <img src="{{ asset('storage/' . $project->project_image) }}" alt='{{ $project->project_name . ' image' }}'
                class="project-image">
        @endif
        <div>Project start date: {{ $project->start_date }}</div>
        <div>Project end date: {{ $project->end_date }}</div>
        <div>Project revenues: {{ $project->revenues }}€</div>
        <div>Project client: {{ $project->client }}</div>
        <div>Project summary: {{ $project->project_summary }}</div>
        <div>Project status: {{ $project->is_completed == 0 ? 'Not Completed' : 'Completed' }}</div>
        <div>Project slug: {{ $project->slug }}</div>
    </div>
@endsection
