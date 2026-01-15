<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function home()
    {
        // Menampilkan halaman index (portfolio)
        return view('index');
    }

    public function index()
    {
        // Contoh: kirim ke view 'project'
        return view('project', [
            'nama' => 'reizer'
        ]);
    }

    public function siswa($nama)
    {
        // Return response 
        return "Halo " . $nama;
    }
}




