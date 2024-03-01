<?php

namespace App\Services;

use App\Models\Animals\Cow;
use App\Models\Animals\Hen;
use App\Models\Farm;

/**
 * Class FarmService.
 */
class FarmService
{
    const ANIMAL_CLASSES = [
        'cow' => Cow::class,
        'hen' => Hen::class
    ];


    const ITERATION_DAYS = 7;







}
