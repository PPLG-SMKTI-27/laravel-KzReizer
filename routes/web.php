<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

Route::get('/', [ProjectController::class, 'home'])->name('index');

Route::get('/project', [ProjectController::class, 'index'])->name('project');


Route::get('/siswa/{nama}', [ProjectController::class, 'siswa'])->name('siswa');
