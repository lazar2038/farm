<?php

namespace App\Models\Animals;
use Illuminate\Support\Str;

class Cow extends Animal
{

    public static $quantity = 10;
    protected int $productionPerDay_min = 8;
    protected int $productionPerDay_max = 12;
    protected static string $animalTitle = 'Корова';
    protected static string $productionTitle = 'Молоко, л.';



}
