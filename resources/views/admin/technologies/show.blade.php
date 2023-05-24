@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <a href="{{ route('admin.technologies.index') }}" class="btn btn-primary btn-sm me-2">Back</a>
            <h2 class="fs-4 text-secondary my-4">Technology Details</h2>
            @if (session('message'))
                <div class="alert alert-success ms-auto p-2" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            <a href="{{ route('admin.technologies.edit', $technology->id) }}" class="btn btn-primary btn-sm me-2 ms-auto"><i
                    class="bi bi-pencil-fill"></i></a>
        </div>
        <span class="badge text-bg-primary fs-5">{{ $technology->name }}</span>
        <div>Technology description: {{ $technology->description }}</div>
        <div><a href="{{ $technology->url }}">Technology documentation</a></div>
        <div>Technology category: {{ $technology->category }}</div>
        <div>Technology slug: {{ $technology->slug }}</div>
        <h4 class="mt-2">{{ $technology->name . ' is included in this projects.' }}</h4>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Project Name</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Revenues</th>
                    <th scope="col">Client</th>
                    <th scope="col">Project Summary</th>
                    <th scope="col">Status</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($technology->projects as $project)
                    <tr>
                        <th scope="row">
                            <a href="{{ route('admin.projects.show', $project->id) }}">
                                {{ $project->project_name }}
                            </a>
                        </th>
                        <td>{{ $project->start_date }}</td>
                        <td>{{ $project->end_date }}</td>
                        <td>{{ $project->revenues }}€</td>
                        <td>{{ $project->client }}</td>
                        <td>{{ $project->project_summary }}</td>
                        <td>{{ $project->is_completed == 0 ? 'Not Completed' : 'Completed' }}</td>
                        <td>{{ $project->slug }}</td>
                        <td>
                            <div class="d-flex justify-content-between gap-1">
                                <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="circle-btn delete-btn">
                                        <i class="bi bi-trash3-fill"></i>
                                    </button>
                                </form>
                                <div class="circle-btn d-flex align-items-center justify-content-center edit-btn">
                                    <a href="{{ route('admin.projects.edit', $project->id) }}"
                                        class="text-decoration-none text-white"><i class="bi bi-pencil-fill"></i></a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
