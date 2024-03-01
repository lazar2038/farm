<?php

namespace App\Models\Animals;
use Illuminate\Support\Str;

class Cow extends Animal
{

    protected int $productionPerDay_min = 8;
    protected int $productionPerDay_max = 12;



}
