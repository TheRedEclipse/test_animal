<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnimalStoreRequest;
use App\Http\Requests\AnimalUpdateRequest;
use App\Services\AnimalService;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    protected $animalService;

    public function __construct(AnimalService $animalService)
    {
        $this->animalService = $animalService;
    }

    /**
     * Display a listing of the animals.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() : object
    {
        return response()->json([
            'success' => true,
            'animals' => $this->animalService->index()
        ]);
    }

    /**
     * Store a newly created animal in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnimalStoreRequest $request) : object
    {
        return response()->json([
            'success' => true,
            'animal_id' => $this->animalService->store($request)
        ]);
    }

    /**
     * Display the specified animal.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json([
            'success' => true,
            'animal' => $this->animalService->show($id)
        ]);
    }

    /**
     * Update the specified animal in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AnimalUpdateRequest $request, $id)
    {
        return response()->json([
            'success' => true,
            'animal_id' => $this->animalService->update($request, $id)
        ]);
    }

    /**
     * Remove the specified animal from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->json([
            'success' => true,
            'animal_id' => $this->animalService->destroy($id)
        ]);
    }
}
