@extends('layouts.layoutpublic')

@section('content')
    <div class="max-w-4xl mx-auto py-10 px-6">
        <h1 class="text-3xl font-bold mb-6">Projects</h1>

        @foreach ($projects as $project)
            <div class="border-b border-gray-300 py-4">
                <p class="text-sm text-gray-500">ID: {{ $project->id }}</p>

                <h2 class="text-xl font-semibold">
                    {{ $project->name }}
                </h2>

                <p class="text-gray-700 mt-2">
                    {{ \Illuminate\Support\Str::limit($project->description, 350) }}
                </p>
            </div>
        @endforeach

        <div class="mt-6">
            {{ $projects->links() }}
        </div>
    </div>
@endsection

