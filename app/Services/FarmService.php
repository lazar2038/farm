<?php

namespace App\Services;

use App\Models\Animals\Cow;
use App\Models\Animals\Hen;

/**
 * Class FarmService.
 */
class FarmService
{
    const ANIMAL_CLASSES = [
        'cow' => Cow::class,
        'hen' => Hen::class
    ];



}
