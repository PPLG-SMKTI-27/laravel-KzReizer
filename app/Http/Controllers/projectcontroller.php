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

    public function project()
    {
    $project = [
        'tagline' => 'Luxury Cars, Premium Experience',
        'desc' => 'Dealer mobil mewah terpercaya, dan menyediakan berbagai pilihan kendaraan eksklusif untuk memenuhi kebutuhan Anda.',
        'profil' => 'Kami adalah dealer mobil mewah yang baru berdiri pada tahun 2026. Dengan komitmen untuk memberikan layanan terbaik dan kendaraan berkualitas tinggi, kami bertujuan untuk menjadi pilihan utama bagi para pecinta mobil mewah di indonesia',
    ];

    return view('project', compact('project'));
}
}