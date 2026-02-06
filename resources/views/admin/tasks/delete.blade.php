@extends('layouts.layoutadmin')

@section('title', 'Delete Task')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Delete Task</h1>

        <div class="alert alert-warning" role="alert">
            <strong>Warning!</strong> Are you sure you want to delete this task? This action cannot be undone.
        </div>

        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
            @csrf
            @method('DELETE')

            {{-- Task Description --}}
            <div class="mb-3">
                <label for="task" class="form-label">Task Description</label>
                <input
                    type="text"
                    class="form-control"
                    id="task"
                    name="task"
                    value="{{ $task->task }}"
                    disabled
                >
            </div>

            {{-- Begin Date --}}
            <div class="mb-3">
                <label for="begindate" class="form-label">Begin Date</label>
                <input
                    type="date"
                    class="form-control"
                    id="begindate"
                    name="begindate"
                    value="{{ $task->begindate }}"
                    disabled
                >
            </div>

            {{-- End Date --}}
            <div class="mb-3">
                <label for="enddate" class="form-label">End Date</label>
                <input
                    type="date"
                    class="form-control"
                    id="enddate"
                    name="enddate"
                    value="{{ $task->enddate }}"
                    disabled
                >
            </div>

            {{-- User Dropdown (only current value) --}}
            <div class="mb-3">
                <label for="user_id" class="form-label">User</label>
                <select class="form-select" id="user_id" name="user_id" disabled>
                    @if($task->user)
                        <option value="{{ $task->user->id }}" selected>{{ $task->user->name }}</option>
                    @else
                        <option value="" selected>N/A</option>
                    @endif
                </select>
            </div>

            {{-- Project Dropdown (only current value) --}}
            <div class="mb-3">
                <label for="project_id" class="form-label">Project</label>
                <select class="form-select" id="project_id" name="project_id" disabled>
                    <option value="{{ $task->project->id }}" selected>{{ $task->project->name }}</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="activity_id" class="form-label">Activity</label>
                <select class="form-select" id="activity_id" name="activity_id" disabled>
                    <option value="{{ $task->activity->id }}" selected>{{ $task->activity->name }}</option>
                </select>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-danger">
                    <i class="bi bi-trash"></i> Confirm Delete
                </button>
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
