@extends('layouts.app')

@section('content')
<div class="container">
    <div class="flex items-center mb-3">
        <h1 class="mr-auto">Birdoard</h1>
        <a href="/projects/create">New Project</a>
    </div>
    <ul>
        @forelse($projects as $project)
        <li>
            <a href="{{ $project->path() }}">
                {{ $project->title }}
            </a>
        </li>
        @empty
        <li>No projects yet.</li>
        @endforelse
    </ul>
</div>
@endsection