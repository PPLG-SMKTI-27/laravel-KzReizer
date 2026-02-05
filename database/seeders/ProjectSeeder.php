<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('projects')->insert([
        [
            'title' => 'LuxAuto',
            'description' => 'Website dealer mobil mewah',
            'image' => 'images/luxauto.jpeg'
        ],
        [
            'title' => 'Portfolio',
            'description' => 'Website Pribadi untuk menampilkan karya dan pengalaman saya',
            'image' => 'images/portfolio.jpeg'
        ]
    ]);
    }
}
