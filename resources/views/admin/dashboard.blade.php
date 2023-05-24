@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-primary my-4">
            {{ __('Dashboard') }}
        </h2>
        <div class="row justify-content-center">
            <div class="col-4">
                <div class="card border-primary">
                    <div class="card-header bg-primary text-white fw-bold">Projects Area</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h4 class="text-center">
                            Projects Details
                        </h4>
                        <div>Projects count: {{ $totalProjects }}</div>
                        @if ($totalProjects > 0)
                            <div>Last creation: {{ $lastCreation->project_name }} - {{ $lastCreation->created_at }}</div>
                            <div>Last edit: {{ $lastEdit->project_name }} - {{ $lastEdit->created_at }}</div>
                            <div>Revenues: {{ $totalRevenues }}€</div>
                        @endif
                    </div>
                    <div class="card-header bg-primary">
                        <a href="{{ Route('admin.projects.index') }}"
                            class="text-decoration-none d-flex align-items-center text-white fw-bold">
                            Go to projects list
                            <i class="ms-2 bi bi-arrow-right-circle-fill fs-3"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card border-primary">
                    <div class="card-header bg-primary text-white fw-bold">Types Area</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h4 class="text-center">
                            Types Details
                        </h4>
                        <div>Total project: {{ $totalProjects }}</div>
                        @foreach ($types as $type)
                        <div>{{$type->name}} projects: {{ count($type->projects) }}</div>
                        @endforeach
                    </div>
                    <div class="card-header bg-primary">
                        <a href="{{ Route('admin.types.index') }}"
                            class="text-decoration-none d-flex align-items-center text-white fw-bold">
                            Go to types list
                            <i class="ms-2 bi bi-arrow-right-circle-fill fs-3"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card border-primary">
                    <div class="card-header bg-primary text-white fw-bold">Technologies Area</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h4 class="text-center">
                            Technologies Details
                        </h4>
                        <div>Total project: {{ $totalProjects }}</div>
                        @foreach ($technologies as $technology)
                        <div>{{$technology->name}} projects: {{ count($technology->projects) }}</div>
                        @endforeach
                    </div>
                    <div class="card-header bg-primary">
                        <a href="{{ Route('admin.technologies.index') }}"
                            class="text-decoration-none d-flex align-items-center text-white fw-bold">
                            Go to technologies list
                            <i class="ms-2 bi bi-arrow-right-circle-fill fs-3"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
