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
                    <h4 class="text-gray-600 mb-3">Tasks</h4>
                    @foreach($project->tasks as $task)
                        <div class="card mb-3">
                            <form action="{{ $task->path() }}" method="POST">
                                @method('PATCH')
                                @csrf
                                <div class="flex items-center">
                                    <input type="text" name="body" value="{{ $task->body }}" class="w-full {{ $task->completed ? 'text-gray-500 line-through' : '' }}">
                                    <input type="checkbox" name="completed" onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}> 
                                </div>
                            </form>
                        </div>
                    @endforeach
                    <div class="card mb-3">
                        <form action="{{ $project->path() . '/tasks' }}" method="POST">
                            @csrf
                            <input type="text" placeholder="Add a new task..." class="w-full" name="body">
                        </form>
                    </div>
                </div>

                <div class="mb-8">
                    <h4 class="text-gray-600 mb-3">General Notes</h4>
                    <form action="{{ $project->path() }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <textarea class="card w-full mb-4" rows="6" name="notes"
                            placeholder="Anything special that you want to make a note of?"
                        >{{ $project->notes }}</textarea>
                        <button type="submit" class="button">Save</button>
                    </form>
                </div>
            </div>
            <div class="lg:w-1/4 px-3">
                <h4 class="text-gray-600 mb-3">Overview</h4>
                @include('projects.card')
            </div> 
        </div>
    </main>
</div>

@endsection