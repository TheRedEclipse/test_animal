<?php

namespace App\Http\Controllers;

use App\Services\AnimalTypeService;
use Illuminate\Http\Request;

class AnimalTypeController extends Controller
{
    protected $animalTypeService;

    public function __construct(AnimalTypeService $animalTypeService)
    {
        $this->animalTypeService = $animalTypeService;
    }

    /**
     * Display a listing of the animal types.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'success' => true,
            'animal_types' => $this->animalTypeService->index()
        ]);
    }
}
