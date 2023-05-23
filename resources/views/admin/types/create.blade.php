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
            <a href="{{ route('admin.types.index') }}" class="btn btn-primary btn-sm me-2">Back</a>
            <h2 class="fs-4 text-secondary my-4">Create new type</h2>
        </div>

        <form action="{{ route('admin.types.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Type name</label>
                <input type="text" class="form-control" id="name" name="name"
                    value="{{ old('name') }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Type description</label>
                <input type="text" class="form-control" id="description" name="description"
                    value="{{ old('description') }}">
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
        </form>
    </div>
@endsection