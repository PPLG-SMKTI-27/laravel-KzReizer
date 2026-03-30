@extends('layouts.dashboard')

@section('content')
<div class="admin-container">
    <div class="flex justify-between items-center mb-8">
        <h2 class="admin-title">Manage Projects</h2>
        <a href="{{ route('projects.create') }}" class="btn btn-create">
            <span>+</span> Create Project
        </a>
    </div>

    <table class="admin-table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Link</th>
                <th width="200">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($projects as $project)
            <tr>
                <td class="font-medium">{{ $project->title }}</td>
                <td>
                    @if($project->link)
                        <a href="{{ $project->link }}" target="_blank" class="text-gold hover:underline">
                            {{ Str::limit($project->link, 30) }}
                        </a>
                    @else
                        <span class="text-muted">—</span>
                    @endif
                </td>
                <td>
                    <div class="flex gap-2">
                        <a href="{{ route('projects.edit', $project) }}" class="btn btn-edit">Edit</a>
                        <form action="{{ route('projects.destroy', $project) }}" method="POST" class="inline">
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
                    No projects yet. Create your first project!
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection