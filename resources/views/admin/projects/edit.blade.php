@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="d-flex align-items-center">
            <a href="{{ route('admin.projects.index') }}" class="btn btn-primary btn-sm me-2">Back</a>
            <h2 class="fs-4 text-secondary my-4">Edit Project</h2>
        </div>

        <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data"
            id="edit-project-form">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="type_id" class="form-label">Project type</label>
                <select class="form-select" name="type_id" id="type_id">
                    <option value="">Select category</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" {{ $project->type_id == $type->id ? 'selected' : '' }}>
                            {{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="project_name" class="form-label">Project name</label>
                <input type="text" class="form-control" id="project_name" name="project_name"
                    value="{{ old('project_name', $project->project_name) }}">
            </div>
            <div class="mb-3">
                <label for="client" class="form-label">Client</label>
                <input type="text" class="form-control" id="client" name="client"
                    value="{{ old('client', $project->client) }}">
            </div>
            <div class="mb-3">
                <label for="project_summary" class="form-label">Project Summary</label>
                <input type="text" class="form-control" id="project_summary" name="project_summary"
                    value="{{ old('project_summary', $project->project_summary) }}">
            </div>
            <div class="mb-3">
                <label for="project_image" class="form-label">Project Image</label>
                <input class="form-control" type="file" id="project_image" name="project_image">
                @if ($project->project_image)
                    <input type="text" class="d-none" id="remove-img-input" name="delete_prev_image">
                    <span id="img-removed-message" class="d-none mt-2 text-success">Previous image removed</span>
                    <button type="button" class="btn btn-danger btn-sm mt-2" id="remove-img-btn">Remove previus
                        image</button>
                @endif
            </div>
            <div class="mb-3">
                <label for="revenues" class="form-label">Revenues</label>
                <input type="numeric" class="form-control" id="revenues" name="revenues"
                    value="{{ old('revenues', $project->revenues) }}">
            </div>
            <div class="mb-3">
                <label class="form-label" for="start_date">Start date</label>
                <input type="date" id="start_date" name="start_date"
                    value="{{ old('start_date', $project->start_date) }}">

                <label class="form-label ms-3" for="end_date">End date</label>
                <input type="date" id="end_date" name="end_date" value="{{ old('end_date', $project->end_date) }}">
            </div>
            <div class='mb-3' id="technologies_div">
                @if ($errors->any())
                    @foreach ($technologies as $technology)
                        <label class="custom-badge badge-not-selected p-2 rounded text-white me-2" for="">
                            <input class="tech-check d-none" type="checkbox" name="technologies[]" id=""
                                value="{{ $technology->id }}"
                                {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}>{{ $technology->name }}
                        </label>
                    @endforeach
                @else
                    @foreach ($technologies as $technology)
                        <label class="custom-badge {{ $project->technologies->contains($technology->id) ? 'badge-selected' : 'badge-not-selected' }} p-2 rounded text-white me-2" for="">
                            <input class="tech-check d-none" type="checkbox" name="technologies[]" id=""
                                value="{{ $technology->id }}"
                                {{ $project->technologies->contains($technology->id) ? 'checked' : '' }}>{{ $technology->name }}
                        </label>
                    @endforeach
                @endif
            </div>
            <div class="form-check">
                <label class="form-check-label" for="is_completed">Project completed</label>
                <input class="form-check-input" type="checkbox" id="is_completed" name="is_completed"
                    @if ($project->is_completed === 1) checked @endif value="1">
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
        </form>
    </div>
@endsection
