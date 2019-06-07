@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <header class="flex justify-between items-end mb-3 py-4">
        <p class="text-gray-500 text-sm font-normal">
            <a href="/projects">My Projects</a> / {{ $project->title }}
        </p>
        <a href="/projects/create" class="button">New Project</a>
    </header>
    <main>
        <div class="lg:flex lg:flex-wrap -mx-3">
            <div class="lg:w-3/4 px-3 mb-6">
                <div class="mb-8">
                    <h2 class="text-lg text-gray-600 font-normal mb-3">Tasks</h2>
                    @foreach($project->tasks as $task)
                        <div class="card mb-3">{{ $task->body }}</div>
                    @endforeach
                </div>

                <div class="mb-8">
                    <h2 class="text-lg text-gray-600 font-normal mb-3">General Notes</h2>
                    <textarea class="card w-full" rows="4">Lorem Ipsum.</textarea>
                </div>
            </div>
            <div class="lg:w-1/4 px-3">
                @include('projects.card')
            </div> 
        </div>
    </main>
</div>

@endsection