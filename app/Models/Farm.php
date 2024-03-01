<?php

namespace App\Models;
use App\Services\FarmService;
use Illuminate\Support\Str;

class Farm
{

    protected $animals = [];

    public function __construct() {

        foreach (FarmService::ANIMAL_CLASSES as $shortName => $className) {
            for ($animals_quantity = 1; $animals_quantity <= $className::$quantity; $animals_quantity++) {
                $this->addAnimal(new $className);
            }
        }

    }

    public function addAnimal(Object $animal) {
        $this->animals[] = $animal;
    }

    public function getAnimals()
    {
        return $this->animals;
    }


}
