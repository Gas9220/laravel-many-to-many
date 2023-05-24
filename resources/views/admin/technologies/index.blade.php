@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between">
            <h2 class="fs-4 text-secondary my-4">Technologies</h2>
            @if (session('message'))
                <div class="alert alert-danger mb-0" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            <a href="{{ route('admin.technologies.create') }}" class="btn btn-primary btn-sm ms-2">Create new technology</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Technology Name</th>
                    <th scope="col">Technology Description</th>
                    <th scope="col">Technology Slug</th>
                    <th scope="col">Technology documentation</th>
                    <th scope="col">Project Count</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($technologies as $technology)
                    <tr>
                        <th scope="row">
                            <a href="{{ route('admin.technologies.show', $technology->id) }}">
                                {{ $technology->name }}
                            </a>
                        </th>
                        <td>{{ $technology->description }}</td>
                        <td>{{ $technology->slug }}</td>
                        <td><a href="{{ $technology->url }}">{{ $technology->url }}</a></td>
                        <td>{{ count($technology->projects) }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <form action="{{ route('admin.technologies.destroy', $technology->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="circle-btn delete-btn">
                                        <i class="bi bi-trash3-fill"></i>
                                    </button>
                                </form>
                                <div class="circle-btn d-flex align-items-center justify-content-center edit-btn">
                                    <a href="{{ route('admin.technologies.edit', $technology->id) }}"
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
