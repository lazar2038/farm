<?php

namespace App\Models\Animals;
use Illuminate\Support\Str;

class Hen extends Animal
{
    public static $quantity = 20;
    protected int $productionPerDay_min = 0;
    protected int $productionPerDay_max = 1;
    protected static string $animalTitle = 'Курица';
    protected static string $productionTitle = 'Яйцо, шт.';

}
