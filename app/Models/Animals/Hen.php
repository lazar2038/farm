<?php

namespace App\Models\Animals;
use Illuminate\Support\Str;

class Hen extends Animal
{

    protected int $productionPerDay_min = 0;
    protected int $productionPerDay_max = 1;



}
