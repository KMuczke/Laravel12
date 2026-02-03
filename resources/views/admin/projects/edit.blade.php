@extends('layouts.layoutadmin')

@section('content')
    <h1>Edit Project</h1>

    {{-- ERRORS --}}
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('projects.update', $project->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Name</label>
            <input
                type="text"
                name="name"
                value="{{ old('name', $project->name) }}"
            >
        </div>

        <div>
            <label>Description</label>
            <textarea name="description">{{ old('description', $project->description) }}</textarea>
        </div>

        <button type="submit">Update Project</button>
    </form>
@endsection
