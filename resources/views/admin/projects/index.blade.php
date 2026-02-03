@extends('layouts.layoutadmin')

@section('content')
    <h1>Projects</h1>

    {{-- FLASH MESSAGE --}}
    @if (session('status'))
        <div>
            {{ session('status') }}
        </div>
    @endif

    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Naam</th>
            <th>Beschrijving</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>Show</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($projects as $project)
            <tr>
                <td>{{ $project->id }}</td>
                <td>{{ $project->name }}</td>
                <td>{{ \Illuminate\Support\Str::limit($project->description, 50) }}</td>

                <td>
                    <a href="{{ route('projects.edit', $project->id) }}">Edit</a>
                </td>

                <td>
                    @can('delete project')
                        <form action="{{ route('projects.destroy', $project) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    @endcan
                </td>

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
