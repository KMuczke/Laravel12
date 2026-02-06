@extends('layouts.layoutadmin')

@section('title', 'Edit Task')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Edit Task</h1>

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Task Description --}}
            <div class="mb-3">
                <label for="task" class="form-label">Task Description</label>
                <input
                    type="text"
                    class="form-control"
                    id="task"
                    name="task"
                    value="{{ old('task', $task->task) }}"
                    required
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
                    value="{{ old('begindate', $task->begindate) }}"
                    required
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
                    value="{{ old('enddate', $task->enddate) }}"
                >
            </div>

            {{-- User Dropdown --}}
            <div class="mb-3">
                <label for="user_id" class="form-label">User</label>
                <select class="form-select" id="user_id" name="user_id">
                    <option value="">-- Select User (Optional) --</option>
                    @foreach($users as $user)
                        <option
                            value="{{ $user->id }}"
                            @selected(old('user_id', $task->user_id) == $user->id)
                        >
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Project Dropdown --}}
            <div class="mb-3">
                <label for="project_id" class="form-label">Project</label>
                <select class="form-select" id="project_id" name="project_id" required>
                    <option value="">-- Select Project --</option>
                    @foreach($projects as $project)
                        <option
                            value="{{ $project->id }}"
                            @selected(old('project_id', $task->project_id) == $project->id)
                        >
                            {{ $project->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Activity Dropdown --}}
            <div class="mb-3">
                <label for="activity_id" class="form-label">Activity</label>
                <select class="form-select" id="activity_id" name="activity_id" required>
                    <option value="">-- Select Activity --</option>
                    @foreach($activities as $activity)
                        <option
                            value="{{ $activity->id }}"
                            @selected(old('activity_id', $task->activity_id) == $activity->id)
                        >
                            {{ $activity->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Submit Button --}}
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Update Task</button>
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
