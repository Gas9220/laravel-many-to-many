<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.projects.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $request->validated();
        $data = $request->all();

        $new_project = new Project();
        $new_project->fill($data);

        $new_project->slug = Str::slug($new_project->project_name, '-');
        $new_project->is_completed = $request['is_completed'] ? 1 : 0;

        if (isset($data['project_image'])) {
            $new_project->project_image = Storage::put('uploads', $data['project_image']);
        }

        $new_project->save();
        return to_route('admin.projects.show', $new_project->id)->with('message', 'Progetto creato correttamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        return view('admin.projects.edit', compact('project', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $request->validated();
        $data = $request->all();
        $project->is_completed = $request['is_completed'] ? 1 : 0;
        $project->slug = Str::slug($project->project_name, '-');

        if (isset($data['project_image'])) {

            if ($project->project_image) {
                Storage::delete($project->project_image);
            }

            $project->project_image = Storage::put('uploads', $data['project_image']);
        } else if (isset($data['delete_prev_image'])) {
            Storage::delete($project->project_image);
            $project->project_image = null;

        }

        $project->update($data);
        return to_route('admin.projects.show', $project->id)->with('message', 'Hai modificato con successo il progetto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project_name = $project->project_name;
        $project->delete();
        return to_route('admin.projects.index')->with('message', $project_name . ' eliminato con successo');
    }
}
