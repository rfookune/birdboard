@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="my-5 p-3">
        <h3 class="mb-3">Create Project</h3>
        <form method="POST" action="/projects">
            @include('projects._form', [
                'project' => new App\Project,
                'buttonText' => 'Create Project'
            ])
        </form>
    </div>
</div>

@endsection