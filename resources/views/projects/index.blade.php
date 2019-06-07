@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <header class="flex justify-between items-end mb-3 py-4">
        <h3 class="text-2xl font-semibold">My Projects</h3>
        <a href="/projects/create" class="button">New Project</a>
    </header>
    <main class="lg:flex lg:flex-wrap -mx-3">
        @forelse($projects as $project)
            <div class="lg:w-1/3 px-3 pb-6">
                <div class="card h-full">
                    <h3 class="font-normal text-xl py-4 -ml-5 mb-3 border-l-4 border-blue-500 pl-4">
                        <a href="{{ $project->path() }}" class="no-underline">{{ $project->title }}</a>
                    </h3>
                    <div class="text-gray-500">{{ str_limit($project->description, 200) }}</div>
                </div>
            </div>
        @empty
            <div>No projects yet.</div>
        @endforelse
    </main>
</div>
@endsection