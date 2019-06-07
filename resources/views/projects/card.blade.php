<div class="card">
    <h4 class="py-4 -ml-5 mb-3 border-l-4 border-blue-500 pl-4">
        <a href="{{ $project->path() }}" class="no-underline">{{ $project->title }}</a>
    </h4>
    <div class="text-gray-500">{{ str_limit($project->description, 200) }}</div>
</div>