<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserDashboardController;


Route::get('/', [ProjectController::class, 'home'])->name('index');


Route::get('/project', [ProjectController::class, 'project'])->name('project');



Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');


