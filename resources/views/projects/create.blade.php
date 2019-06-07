@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="my-5">
        <h3 class="mb-3">Create Project</h3>
        <div class="card">
            <form method="POST" action="/projects" class="p-3">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Title">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" rows="4" id="description" class="form-control" placeholder="What is this project about?"></textarea>
                </div>
                <div class="mt-2">
                    <button type="submit" class="button">Save</button>
                    <a href="/projects" class="ml-3 button-link">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection