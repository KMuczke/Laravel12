@extends('layouts.layoutadmin')

@section('title', 'Tasks')

@section('content')
    <div class="container mt-4">
        <div class="row mb-3">
            <div class="col">
                <h1>Tasks</h1>
            </div>
            @can('create task')
                <div class="col text-end">
                    <a href="{{ route('tasks.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Create New Task
                    </a>
                </div>
            @endcan
        </div>

        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Task</th>
                    <th>Begin Date</th>
                    <th>End Date</th>
                    <th>User</th>
                    <th>Project</th>
                    <th>Activity</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td>{{ $task->id }}</td>
                        <td>{{ Str::limit($task->task, 50) }}</td>
                        <td>{{ $task->begindate }}</td>
                        <td>{{ $task->enddate ? $task->enddate : '' }}</td>
                        <td>{{ $task->user ? $task->user->name : 'N/A' }}</td>
                        <td>{{ $task->project->name }}</td>
                        <td>{{ $task->activity->name }}</td>
                        <td>
                            @can('show task')
                                <a href="{{ route('tasks.show', $task) }}" class="btn btn-sm btn-info">
                                    <i class="bi bi-eye"></i> Show
                                </a>
                            @endcan

                            @can('edit task')
                                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                            @endcan

                            @can('delete task')
                                <a href="{{ route('tasks.delete', $task) }}" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i> Delete
                                </a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            {{ $tasks->links() }}
        </div>
    </div>
@endsection
