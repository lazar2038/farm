<?php

namespace App\Models\Animals;
use Illuminate\Support\Str;

abstract class Animal
{
    private $uuid;

    protected int $productionPerDay_min;
    protected int $productionPerDay_max;


    public function __construct() {
        $this->uuid = Str::uuid();
    }

    public function getUuid()
    {
        return $this->uuid;
    }

    public function getProductionPerDay() {
        return rand($this->productionPerDay_min, $this->productionPerDay_max);
    }

    public static function getProductionTitle() {
        return static::$productionTitle;
    }



}
