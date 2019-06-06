@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="flex items-center mb-3">
        <h1 class="mr-auto">Birdoard</h1>
        <a href="/projects/create">New Project</a>
    </div>

    <div class="flex">
        @forelse($projects as $project)
            <div class="bg-white mr-4 rounded shadow w-1/3 p-5">
                <h3 class="font-normal text-xl py-4">{{ $project->title }}</h3>
                <div class="text-gray-500">{{ str_limit($project->description, 200) }}</div>
            </div>
        @empty
            <div>No projects yet.</div>
        @endforelse
    </div>
</div>
@endsection