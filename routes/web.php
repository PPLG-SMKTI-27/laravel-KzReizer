<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProjectsController;
use App\Http\Controllers\ProjectController;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\DashboardController;

// ===== PUBLIC ROUTES =====
Route::get('/', [ProjectController::class, 'home'])->name('index');
Route::get('/project/{id}', [ProjectController::class, 'show'])->name('project.detail');

// ===== ROUTES YANG MEMERLUKAN LOGIN (USER BIASA) =====
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/project', [ProjectController::class, 'project'])->name('project');
});

// ===== DASHBOARD ADMIN (LANGSUNG /dashboard) =====
Route::middleware(['auth', 'isAdmin'])->group(function () {
    // Dashboard utama - langsung /dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    

    // Management Skills - /skills, /skills/create, dll
    Route::resource('skills', SkillController::class);
    
    // Management Projects - /projects, /projects/create, dll
    Route::resource('projects', ProjectsController::class);
});

// ===== AUTH ROUTES =====
require __DIR__.'/auth.php';