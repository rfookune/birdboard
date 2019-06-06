@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create a Project</h1>
    <form method="POST" action="/projects">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" placeholder="Title">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Create Project</button>
            <a href="/projects" class="btn btn-light">Cancel</a>
        </div>
    </form>
</div>

@endsection