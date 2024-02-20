<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\projects\StoreProjectRequest;
use App\Http\Requests\projects\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('pages/admin/projects/index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $project = new Project();
        $types = Type::all();
        $technologies = Technology::all();
        return view('pages.admin.projects.create', compact('project', 'types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $validated = $request->validated();
        $newProject = Project::create($validated);
        return to_route('admin.projects.show', $newProject)->with('message', 'Record Created with success!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('pages/admin/projects/show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('pages.admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $validated = $request->validated();
        $project->update($validated);
        return to_route('admin.projects.show', $project)->with('message', 'Record edited with success!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(project $project)
    {
        $project->delete();
        return to_route('admin.projects.index')->with('message', 'Record deleted with success!');
    }

    /**
     * Display the deleted resource.
     */
    public function deleted() 
    {
        $projects = Project::onlyTrashed()->get();
        return view('pages.admin.projects.deleted', compact('projects'));
    }

    /**
     * Restore the deleted resource.
     */
    public function restore(String $id)
    {
        $project = Project::withTrashed()->where('id', $id)->first();
        $project->restore();
        return to_route('admin.projects.deleted')->with('message', 'Record restored with success!');
    }

    /**
     * Permanent delete the deleted resource.
     */
    public function permanentDestroy(String $id)
    {
        $project = Project::withTrashed()->where('id', $id)->first();
        $project->forceDelete();
        return to_route('admin.projects.deleted')->with('message', 'Record permanent deleted!');
    }
}
