<?php

namespace App\Console\Commands;

use App\Models\Animals\Cow;
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

        $cow = new Cow();
        $this->info($cow->getProductionPerDay());

    }
}
