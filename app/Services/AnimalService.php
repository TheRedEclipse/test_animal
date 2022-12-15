<?php

namespace App\Services;

use App\Models\Animal;
use Carbon\Carbon;

class AnimalService
{
    protected $animal;

    public function __construct(Animal $animal)
    {
        $this->animal = $animal;
    }

    /**
     * Display a listing of the animals.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): object
    {
        return $this->animal->get();
    }

    /**
     * Store a newly created animal in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(object $request): int
    {
        return $this->animal->create($request->validated() + [
            'born' => Carbon::now(),
        ])->id;
    }

    /**
     * Display the animal resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) : object
    {
        return $this->animal->whereId($id)->firstOrFail();
    }

    /**
     * Update the specified animal in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(object $request, int $id) : int
    {
        $animal = $this->animal->whereId($id)->firstOrFail();

        $animal->update($request->validated());

        return $id;
    }

    /**
     * Remove the specified animal from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id) : int
    {
        $animal = $this->animal->whereId($id)->firstOrFail();

        $animal->delete();

        return $id;
    }
}
