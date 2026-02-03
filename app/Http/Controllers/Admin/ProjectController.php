<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Http\Requests\ProjectStoreRequest;
use App\Http\Requests\ProjectUpdateRequest;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ProjectController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            Middleware::make('permission:index project')->only(['index']),
            Middleware::make('permission:create project')->only(['create', 'store']),
            Middleware::make('permission:show project')->only(['show']),
            Middleware::make('permission:edit project')->only(['edit', 'update']),
            Middleware::make('permission:delete project')->only(['delete', 'destroy']),
        ];
    }

    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(ProjectStoreRequest $request)
    {
        Project::create($request->validated());
        return to_route('projects.index');
    }

    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(ProjectUpdateRequest $request, Project $project)
    {
        $project->update($request->validated());
        return to_route('projects.index');
    }

    public function delete(Project $project)
    {
        return view('admin.projects.delete', compact('project'));
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return to_route('projects.index');
    }
}

