<?php

namespace App\Services;

use App\Models\AnimalType;

class AnimalTypeService
{
    protected $animalType;

    public function __construct(AnimalType $animalType)
    {
        $this->animalType = $animalType;
    }

    /**
     * Display a listing of the animal types.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): object
    {
        return $this->animalType->all();
    }
}
