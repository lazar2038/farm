<?php

namespace App\Console\Commands;

use App\Models\Animals\Cow;
use App\Services\FarmService;
use Illuminate\Console\Command;

class FarmLife extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'farm:life';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Farm simulator is here.');


        foreach (FarmService::ANIMAL_CLASSES as $shortName => $className) {

            $this->info($className);

        }

        $cow = new Cow();
        $this->info(Cow::getProductionTitle());

    }
}
