<?php

namespace Database\Seeders;

use App\Models\AnimalType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnimalTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $animalTypes = [
            [
                'name' => 'cat',
                'title' => 'Кот',
                'lifetime' => 20,
                'growth_multiplier' => 3
            ],
            [
                'name' => 'dog',
                'title' => 'Собака',
                'lifetime' => 12,
                'growth_multiplier' => 4
            ],
            [
                'name' => 'dove',
                'title' => 'Голубь',
                'lifetime' => 8,
                'growth_multiplier' => 8
            ],
            [
                'name' => 'bear',
                'title' => 'Медведь',
                'lifetime' => 30,
                'growth_multiplier' => 2
            ],

        ];

        foreach ($animalTypes as $animalType) {
            AnimalType::create($animalType);
        }
    }
}
