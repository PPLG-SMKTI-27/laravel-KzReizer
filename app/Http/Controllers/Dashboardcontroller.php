<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalProjects = Project::count();
        $totalSkills = Skill::count();
        $latestProjects = Project::latest()->take(5)->get();
        
        return view('dashboard', compact('totalProjects', 'totalSkills', 'latestProjects'));
    }
}