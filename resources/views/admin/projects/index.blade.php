@extends('layouts.layoutadmin')

@section('content')
    <h1>Projects</h1>

    {{-- FLASH MESSAGE --}}
    @if (session('status'))
        <div>
            {{ session('status') }}
        </div>
    @endif

    @can('create project')
        <a href="{{ route('projects.create') }}">Create New Project</a>
    @endcan

    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Naam</th>
            <th>Beschrijving</th>
            @can('edit project')
                <th>Edit</th>
            @endcan
            @can('delete project')
                <th>Delete</th>
            @endcan
            <th>Show</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($projects as $project)
            <tr>
                <td>{{ $project->id }}</td>
                <td>{{ $project->name }}</td>
                <td>{{ \Illuminate\Support\Str::limit($project->description, 50) }}</td>

                @can('edit project')
                    <td>
                        <a href="{{ route('projects.edit', $project->id) }}">Edit</a>
                    </td>
                @endcan

                @can('delete project')
                    <td>
                        <a href="{{ route('projects.delete', $project->id) }}">Delete</a>
                    </td>
                @endcan

                <td>
                    <a href="{{ route('projects.show', $project->id) }}">
                        Show
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
