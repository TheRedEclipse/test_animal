<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\AnimalType;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnimalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentTime = Carbon::now();

        $animalTypes = [
            [
                'animal_type_id' => AnimalType::whereName('cat')->firstOrFail()->id,
                'title' => 'Мурзик',
                'born' => $currentTime
            ],
            [
                'animal_type_id' => AnimalType::whereName('dog')->firstOrFail()->id,
                'title' => 'Бимка',
                'born' => $currentTime
            ],
            [
                'animal_type_id' => AnimalType::whereName('dove')->firstOrFail()->id,
                'title' => 'Голубок',
                'born' => $currentTime
            ],
            [
                'animal_type_id' => AnimalType::whereName('bear')->firstOrFail()->id,
                'title' => 'Миша',
                'born' => $currentTime
            ],


        ];

        foreach ($animalTypes as $animalType) {
            Animal::create($animalType);
        }
    }
}
