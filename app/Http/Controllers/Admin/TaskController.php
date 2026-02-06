<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use App\Models\Activity;
use App\Http\Requests\TaskStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class TaskController extends Controller implements HasMiddleware
{
    // ... rest of the code stays the same
    /**
     * Get the middleware that should be assigned to the controller.
     */
    public static function middleware(): array
    {
        return [
            new Middleware('permission:index task', only: ['index']),
            new Middleware('permission:create task', only: ['create', 'store']),
            new Middleware('permission:show task', only: ['show']),
            new Middleware('permission:edit task', only: ['edit', 'update']),
            new Middleware('permission:delete task', only: ['delete', 'destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::with(['user', 'project', 'activity'])
            ->paginate(15);

        return view('admin.tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $projects = Project::all();
        $activities = Activity::all();

        return view('admin.tasks.create', compact('users', 'projects', 'activities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskStoreRequest $request)
    {
        $task = new Task();
        $task->forceFill($request->validated());
        $task->save();

        return redirect()->route('tasks.index')
            ->with('status', "Taak: {$task->task} is aangemaakt");
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('admin.tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $users = User::all();
        $projects = Project::all();
        $activities = Activity::all();

        return view('admin.tasks.edit', compact('task', 'users', 'projects', 'activities'));
    }

    /**
     * Update the specified resource in storage.
     */
    /**
     * Update the specified resource in storage.
     */
    public function update(TaskStoreRequest $request, Task $task)
    {
        $task->forceFill($request->validated());
        $task->save();

        return redirect()->route('tasks.index')
            ->with('status', "Taak: {$task->task} is gewijzigd");
    }

    public function delete(Task $task)
    {
        return view('admin.tasks.delete', compact('task'));
    }

    /**
     * Remove the specified resource from storage.
     */
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $taskName = $task->task;
        $task->delete();

        return redirect()->route('tasks.index')
            ->with('status', "Taak: {$taskName} is verwijderd");
    }
}
