<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Order;
use App\Models\Project;
use App\Models\Skill;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProjects = Project::count();
        $totalSkills = Skill::count();
        $latestProjects = Project::latest()->take(5)->get();
        $totalCars = Car::count();
        $readyStock = Car::where('status', 'available')->sum('stock');
        $newOrders = Order::where('status', 'new')->count();
        $completedOrders = Order::where('status', 'completed')->count();
        $latestOrders = Order::with('car')->latest('ordered_at')->take(5)->get();
        
        return view('dashboard', compact(
            'totalProjects',
            'totalSkills',
            'latestProjects',
            'totalCars',
            'readyStock',
            'newOrders',
            'completedOrders',
            'latestOrders'
        ));
    }
}
