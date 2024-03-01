<?php

namespace App\Models;
use App\Services\FarmService;
use Illuminate\Support\Str;

class Farm
{
    protected $animals = [];
    protected $production = [];

    public function __construct() {

        foreach (FarmService::ANIMAL_CLASSES as $animalShortName => $animalClassName) {
            for ($animals_quantity = 1; $animals_quantity <= $animalClassName::$quantity; $animals_quantity++) {
                $this->addAnimal(new $animalClassName);
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

    public function getAnimalsByGroups()
    {
        $output = [];
        foreach ($this->animals as $animal) {
            if(!isset($output[get_class($animal)])) {
                $output[get_class($animal)] = 1;
            }
            else {
                $output[get_class($animal)] += 1;
            }

        }
        return $output;
    }

    public function setProductionByDay() {
        foreach($this->animals as $animal) {
            if(!isset($this->production[get_class($animal)])) {
                $this->production[get_class($animal)] = $animal->getProductionPerDay();
            }
            else {
                $this->production[get_class($animal)] += $animal->getProductionPerDay();
            }
        }
    }

    public function setProductionByDays($days = 1) {
        for($day = 1; $day <= $days; $day++ ) {
            $this->setProductionByDay();
        }
    }


    public function getAllProduction()
    {
        return $this->production;
    }

}
