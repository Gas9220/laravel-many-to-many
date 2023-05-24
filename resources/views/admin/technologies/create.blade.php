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
            <a href="{{ route('admin.technologies.index') }}" class="btn btn-primary btn-sm me-2">Back</a>
            <h2 class="fs-4 text-secondary my-4">Create new technology</h2>
        </div>

        <form action="{{ route('admin.technologies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Technology name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Technology description</label>
                <input type="text" class="form-control" id="description" name="description"
                    value="{{ old('description') }}">
            </div>
            <div class="mb-3">
                <label for="url" class="form-label">Technology documentation</label>
                <input type="text" class="form-control" id="url" name="url" value="{{ old('url') }}">
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Technology category</label>
                <select class="form-select" name="category" id="category">
                    <option value="">Select category</option>
                    <option value="Frontend Technology" {{ old('category')}}>Frontend Technology</option>
                    <option value="Backend Technology" {{ old('category')}}>Backend Technology</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
        </form>
    </div>
@endsection
