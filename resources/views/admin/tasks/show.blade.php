@extends('layouts.layoutadmin')

@section('title', 'Show Task')

@section('content')
    <div class="container mt-4">
        <div class="row mb-3">
            <div class="col">
                <h1>Task Details</h1>
            </div>
            <div class="col text-end">
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Back to Tasks
                </a>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Task #{{ $task->id }}</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-3">
                        <strong>Task ID:</strong>
                    </div>
                    <div class="col-md-9">
                        {{ $task->id }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3">
                        <strong>Task Description:</strong>
                    </div>
                    <div class="col-md-9">
                        {{ $task->task }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3">
                        <strong>Begin Date:</strong>
                    </div>
                    <div class="col-md-9">
                        {{ $task->begindate }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3">
                        <strong>End Date:</strong>
                    </div>
                    <div class="col-md-9">
                        {{ $task->enddate ?? 'N/A' }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3">
                        <strong>Assigned User:</strong>
                    </div>
                    <div class="col-md-9">
                        {{ $task->user->name ?? 'N/A' }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3">
                        <strong>Project:</strong>
                    </div>
                    <div class="col-md-9">
                        {{ $task->project->name }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3">
                        <strong>Activity Status:</strong>
                    </div>
                    <div class="col-md-9">
                        {{ $task->activity->name }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3">
                        <strong>Created At:</strong>
                    </div>
                    <div class="col-md-9">
                        {{ $task->created_at }}
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <div class="d-flex gap-2">
                    @can('edit task')
                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning">
                            <i class="bi bi-pencil"></i> Edit Task
                        </a>
                    @endcan

                    @can('delete task')
                        <a href="{{ route('tasks.delete', $task) }}" class="btn btn-danger">
                            <i class="bi bi-trash"></i> Delete Task
                        </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
