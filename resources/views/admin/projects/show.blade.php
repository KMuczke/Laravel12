@extends('layouts.layoutadmin')

@section('topmenu')
    <a href="{{ route('projects.index') }}">← Terug naar projecten</a>
@endsection

@section('content')
    <h1>Project details</h1>

    <ul>
        <li><strong>ID:</strong> {{ $project->id }}</li>
        <li><strong>Naam:</strong> {{ $project->name }}</li>
        <li><strong>Beschrijving:</strong> {{ $project->description }}</li>
        <li><strong>Aangemaakt op:</strong> {{ $project->created_at }}</li>
    </ul>
@endsection
