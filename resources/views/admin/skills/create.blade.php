@extends('layouts.dashboard')

@section('content')
<div class="admin-container">
    <h2 class="admin-title">Create New Skill</h2>
    
    @if($errors->any())
    <div class="alert alert-error mb-4">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('skills.store') }}" method="POST" class="admin-form">
        @csrf
        
        <div>
            <label for="name">Skill Name</label>
            <input 
                type="text" 
                id="name" 
                name="name" 
                placeholder="e.g., Laravel, JavaScript, UI Design" 
                value="{{ old('name') }}"
                required
            >
            @error('name')
                <small class="text-error">{{ $message }}</small>
            @enderror
        </div>
        
        <div>
            <label for="level">Proficiency Level</label>
            <select id="level" name="level" required>
                <option value="">Select level</option>
                <option value="Beginner" {{ old('level') == 'Beginner' ? 'selected' : '' }}>Beginner</option>
                <option value="Intermediate" {{ old('level') == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
                <option value="Advanced" {{ old('level') == 'Advanced' ? 'selected' : '' }}>Advanced</option>
                <option value="Expert" {{ old('level') == 'Expert' ? 'selected' : '' }}>Expert</option>
            </select>
            @error('level')
                <small class="text-error">{{ $message }}</small>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-create w-full mt-6">Create Skill</button>
    </form>
</div>
@endsection