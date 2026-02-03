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
            'description' => 'Dealer mobil mewah',
            'image' => 'luxauto.png'
        ],
        [
            'title' => 'Portfolio',
            'description' => 'Website biodata',
            'image' => 'porto.png'
        ]
    ]);
    }
}
