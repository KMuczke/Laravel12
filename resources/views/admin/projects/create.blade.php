@extends('layouts.layoutadmin')

@section('topmenu')
    <a href="{{ route('projects.index') }}" class="text-sm text-blue-600 hover:underline">
        &larr; Back to Projects
    </a>
@endsection

@section('content')
    <h1 class="text-2xl font-bold mb-4">Create Project</h1>

    {{-- VALIDATIE FOUTMELDINGEN (ONDER DE TITEL, VOLGENS OPDRACHT) --}}
    @if ($errors->any())
        <div class="mb-4 text-red-600">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('projects.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="name" class="block text-sm font-medium">Project Name</label>
            <input
                type="text"
                name="name"
                id="name"
                value="{{ old('name') }}"
                class="mt-1 block w-full border rounded p-2"
                required
            >

        </div>

        <div>
            <label for="description" class="block text-sm font-medium">Description</label>
            <textarea
                name="description"
                id="description"
                rows="4"
                class="mt-1 block w-full border rounded p-2"
                required
            >{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Add Project
        </button>
    </form>
@endsection
