@extends('layouts.layoutadmin')

@section('content')
    <h1>Delete Project</h1>

    <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
        @csrf
        @method('DELETE')

        <div>
            <label>Project name</label>
            <input type="text" value="{{ $project->name }}" disabled>
        </div>

        <div>
            <label>Description</label>
            <textarea disabled>{{ $project->description }}</textarea>
        </div>

        <button type="submit">
            Delete
        </button>
    </form>
@endsection
