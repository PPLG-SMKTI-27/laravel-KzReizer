@extends('layouts.dashboard')

@section('content')
<div class="admin-container">
    <h2 class="admin-title">Create New Project</h2>
    
    @if($errors->any())
    <div class="alert alert-error mb-4">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data" class="admin-form">
        @csrf
        
        <div>
            <label for="title">Project Title</label>
            <input 
                type="text" 
                id="title" 
                name="title" 
                placeholder="e.g., E-commerce Website" 
                value="{{ old('title') }}"
                required
            >
            @error('title')
                <small class="text-error">{{ $message }}</small>
            @enderror
        </div>
        
        <div>
            <label for="description">Description</label>
            <textarea 
                id="description" 
                name="description" 
                rows="5" 
                placeholder="Describe your project..." 
                required
            >{{ old('description') }}</textarea>
            @error('description')
                <small class="text-error">{{ $message }}</small>
            @enderror
        </div>
        
        <div>
            <label for="link">Project Link (optional)</label>
            <input 
                type="url" 
                id="link" 
                name="link" 
                placeholder="https://example.com"
                value="{{ old('link') }}"
            >
            @error('link')
                <small class="text-error">{{ $message }}</small>
            @enderror
        </div>
        
        <div>
            <label for="image">Project Image (optional)</label>
            <input 
                type="file" 
                id="image" 
                name="image" 
                accept="image/jpeg,image/png,image/jpg,image/gif"
            >
            <small class="text-muted">Max size: 2MB. Format: JPG, PNG, GIF</small>
            @error('image')
                <small class="text-error">{{ $message }}</small>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-create w-full mt-6">Create Project</button>
    </form>
</div>
@endsection