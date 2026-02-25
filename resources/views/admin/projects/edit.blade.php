@extends('layouts.dashboard')

@section('content')
<div class="admin-container">
    <h2 class="admin-title">Edit Project</h2>
    
    <form action="{{ route('projects.update', $project) }}" method="POST" enctype="multipart/form-data" class="admin-form">
        @csrf
        @method('PUT')
        
        <div>
            <label for="title">Project Title</label>
            <input type="text" id="title" name="title" value="{{ $project->title }}" required>
        </div>
        
        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description" rows="5" required>{{ $project->description }}</textarea>
        </div>
        
        <div>
            <label for="link">Project Link</label>
            <input type="url" id="link" name="link" value="{{ $project->link }}" placeholder="https://example.com">
        </div>
        
        @if($project->image)
        <div class="mb-4">
            <label>Current Image</label>
            <div class="mt-2">
                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="rounded-lg border border-dark-border">
            </div>
        </div>
        @endif
        
        <div>
            <label for="image">Update Image (optional)</label>
            <input type="file" id="image" name="image" accept="image/*">
        </div>
        
        <div class="flex gap-3 mt-6">
            <button type="submit" class="btn btn-create">Update Project</button>
            <a href="{{ route('projects.index') }}" class="btn btn-edit">Cancel</a>
        </div>
    </form>
</div>
@endsection