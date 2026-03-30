@extends('layouts.dashboard')

@section('content')
<div class="admin-container">
    <div class="flex justify-between items-center mb-8">
        <h2 class="admin-title">Manage Skills</h2>
        <a href="{{ route('skills.create') }}" class="btn btn-create">
            <span>+</span> Create Skill
        </a>
    </div>

    <table class="admin-table">
        <thead>
            <tr>
                <th>Skill Name</th>
                <th>Level</th>
                <th width="200">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($skills as $skill)
            <tr>
                <td class="font-medium">{{ $skill->name }}</td>
                <td>
                    <span class="text-gold">{{ $skill->level }}</span>
                </td>
                <td>
                    <div class="flex gap-2">
                        <a href="{{ route('skills.edit', $skill) }}" class="btn btn-edit">Edit</a>
                        <form action="{{ route('skills.destroy', $skill) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center py-8 text-secondary">
                    No skills yet. Add your first skill!
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection