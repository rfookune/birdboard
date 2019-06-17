@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="my-5 p-3">
        <h3 class="mb-3">Edit Your Project</h3>
        <form method="POST" action="{{ $project->path() }}">
            @method('PATCH')
            @include('projects._form', [
                'buttonText' => 'Update Project'
            ])
        </form
    </div>
</div>

@endsection