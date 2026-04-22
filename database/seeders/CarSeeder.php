<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cars = [
            [
                'name' => 'Mercedes-Benz S-Class 2024',
                'brand' => 'Mercedes-Benz',
                'model' => 'S-Class',
                'condition' => 'new',
                'transmission' => 'automatic',
                'fuel_type' => 'hybrid',
                'mileage' => 1200,
                'color' => 'Obsidian Black',
                'year' => 2024,
                'price' => 115000,
                'stock' => 2,
                'is_featured' => true,
                'status' => 'available',
                'description' => 'The pinnacle of luxury sedans. Featuring advanced MBUX infotainment, massage seats, Burmester audio, and unparalleled ride comfort. The S-Class redefines automotive excellence.',
                'image' => null,
            ],
            [
                'name' => 'BMW 7 Series M760e',
                'brand' => 'BMW',
                'model' => '7 Series',
                'condition' => 'new',
                'transmission' => 'automatic',
                'fuel_type' => 'hybrid',
                'mileage' => 800,
                'color' => 'Mineral White',
                'year' => 2024,
                'price' => 125000,
                'stock' => 1,
                'is_featured' => true,
                'status' => 'available',
                'description' => 'Ultimate driving machine in luxury form. Plug-in hybrid powertrain with 536hp, executive lounge seating, crystal controls, and futuristic iDrive 8 system.',
                'image' => null,
            ],
            [
                'name' => 'Audi A8 L 60 TFSI',
                'brand' => 'Audi',
                'model' => 'A8 L',
                'condition' => 'used',
                'transmission' => 'automatic',
                'fuel_type' => 'petrol',
                'mileage' => 28900,
                'color' => 'Navarra Blue',
                'year' => 2024,
                'price' => 95000,
                'stock' => 3,
                'is_featured' => false,
                'status' => 'available',
                'description' => 'Sophisticated luxury with quattro all-wheel drive. Matrix LED headlights, Bang & Olufsen sound, and advanced driver assistance systems.',
                'image' => null,
            ],
            [
                'name' => 'Porsche Panamera Turbo S',
                'brand' => 'Porsche',
                'model' => 'Panamera',
                'condition' => 'new',
                'transmission' => 'automatic',
                'fuel_type' => 'petrol',
                'mileage' => 400,
                'color' => 'Carmine Red',
                'year' => 2024,
                'price' => 195000,
                'stock' => 1,
                'is_featured' => true,
                'status' => 'reserved',
                'description' => '680hp twin-turbo V8 with sports car dynamics. PDCC active suspension, rear-axle steering, and 0-60 in 2.9 seconds.',
                'image' => null,
            ],
            [
                'name' => 'Rolls-Royce Ghost',
                'brand' => 'Rolls-Royce',
                'model' => 'Ghost',
                'condition' => 'used',
                'transmission' => 'automatic',
                'fuel_type' => 'petrol',
                'mileage' => 5100,
                'color' => 'Silver Tempest',
                'year' => 2024,
                'price' => 350000,
                'stock' => 0,
                'is_featured' => true,
                'status' => 'sold',
                'description' => 'The ultimate statement of luxury. Bespoke craftsmanship, Starlight Headliner, and effortless power delivery. True automotive artistry.',
                'image' => null,
            ],
        ];

        foreach ($cars as $carData) {
            Car::create($carData);
        }
    }
}

