@extends('layouts.dashboard')

@section('content')
<div class="admin-container">
    <h2 class="admin-title">Edit Skill</h2>
    
    <form action="{{ route('skills.update', $skill) }}" method="POST" class="admin-form">
        @csrf
        @method('PUT')
        
        <div>
            <label for="name">Skill Name</label>
            <input type="text" id="name" name="name" value="{{ $skill->name }}" required>
        </div>
        
        <div>
            <label for="level">Proficiency Level</label>
            <select id="level" name="level" required>
                <option value="Beginner" {{ $skill->level == 'Beginner' ? 'selected' : '' }}>Beginner</option>
                <option value="Intermediate" {{ $skill->level == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
                <option value="Advanced" {{ $skill->level == 'Advanced' ? 'selected' : '' }}>Advanced</option>
                <option value="Expert" {{ $skill->level == 'Expert' ? 'selected' : '' }}>Expert</option>
            </select>
        </div>
        
        <div class="flex gap-3 mt-6">
            <button type="submit" class="btn btn-create">Update Skill</button>
            <a href="{{ route('skills.index') }}" class="btn btn-edit">Cancel</a>
        </div>
    </form>
</div>
@endsection