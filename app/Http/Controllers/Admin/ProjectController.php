<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $projects = Project::paginate(9);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     *
     */
    public function store(StoreProjectRequest $request)
    {
        $form_data = $request->validated();
        $slug = Str::slug($form_data['title'], '-');
        $form_data['slug'] = $slug;
        $newProject = Project::create($form_data);
        return redirect()->route('admin.projects.show', $newProject->slug)->with('message', "Project {$newProject->slug} successfully created");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     *
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     *
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     *
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $form_data = $request->validated();
        $slug = Str::slug($request->title, '-');
        $form_data['slug'] = $slug;
        $project->update($form_data);
        return redirect()->route('admin.projects.show', $project->slug)->with('message', "Project {$project->slug} successfully edited");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     *
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('message', "$project->title deleted successfully!");
    }
}
