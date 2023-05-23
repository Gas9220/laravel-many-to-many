@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between">
            <h2 class="fs-4 text-secondary my-4"> Project types</h2>
            @if (session('message'))
                <div class="alert alert-danger mb-0" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            <a href="{{ route('admin.types.create') }}" class="btn btn-primary btn-sm ms-2">Create new type</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Type Name</th>
                    <th scope="col">Type Description</th>
                    <th scope="col">Type Slug</th>
                    <th scope="col">Project Count</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($types as $type)
                    <tr>
                        <th scope="row">
                            <a href="{{ route('admin.types.show', $type->id) }}">
                                {{ $type->name }}
                            </a>
                        </th>
                        <td>{{ $type->description }}</td>
                        <td>{{ $type->slug }}</td>
                        <td>{{ count($type->projects) }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <form action="{{ route('admin.types.destroy', $type->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="circle-btn delete-btn">
                                        <i class="bi bi-trash3-fill"></i>
                                    </button>
                                </form>
                                <div class="circle-btn d-flex align-items-center justify-content-center edit-btn">
                                    <a href="{{ route('admin.types.edit', $type->id) }}"
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
