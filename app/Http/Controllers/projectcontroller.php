<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Halaman utama / home
     */
    public function home()
    {
        $projects = Project::latest()->get();
        $skills = Skill::all();
        
        return view('index', compact('projects', 'skills'));
    }
    
    /**
     * Halaman detail project (public)
     */
    public function show($id)
    {
        $project = Project::findOrFail($id);
        return view('project-detail', compact('project'));
    }
    
    /**
     * Halaman project (untuk user yang login)
     */
    public function project()
    {
        $projects = Project::latest()->get();
        return view('project', compact('projects'));
    }
}