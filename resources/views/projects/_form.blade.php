<div class="card">
    @csrf
    
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" 
            class="form-control" 
            name="title" 
            placeholder="Title" 
            value="{{ $project->title }}"
            required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" 
            rows="4" 
            id="description" 
            class="form-control" 
            placeholder="What is this project about?"
            required
        >{{ $project->description }}</textarea>
    </div>
    <div class="mt-2">
        <button type="submit" class="button">{{ $buttonText }}</button>
        <a href="{{ $project->path() }}" class="ml-3 button-link">Cancel</a>
    </div>

    @if($errors->any())
        <div class="form-group mt-6">
            @foreach($errors->all() as $error)
                <li class="text-sm text-red-600">{{ $error }}</li>
            @endforeach
        </div>
    @endif
</div>