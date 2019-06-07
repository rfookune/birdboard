@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="mt-5 w-1/2 mx-auto">
        <div class="card">
            <h4 class="mb-2">Dashboard</h4>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <p class="mb-4">You are logged in!</p>
            <a href="/projects" class="button">My Projects</a>
        </div>
    </div>
</div>
@endsection
