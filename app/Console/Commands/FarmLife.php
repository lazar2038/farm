<?php

namespace App\Console\Commands;

use App\Models\Animals\Cow;
use App\Models\Animals\Hen;
use App\Models\Farm;
use App\Services\FarmService;
use Illuminate\Console\Command;
use function Laravel\Prompts\pause;

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

        $farm = new Farm();
        $this->info('На ферме есть следующие животные:');

        foreach($farm->getAnimalsByGroups() as $class => $quantity) {
            $this->info($class::getAnimalTitle().': '. $quantity.' голов');
        }


        $bar = $this->output->createProgressBar(FarmService::ITERATION_DAYS);



        $this->info('Начинается новая неделя, ждём '.FarmService::ITERATION_DAYS.' дней');
        $bar->start();
        for ($day = 1; $day<= FarmService::ITERATION_DAYS; $day++) {
            usleep(500000);
            $bar->advance();
        }
        $bar->finish();
        $this->newLine(2);



        $farm->setProductionByDays(FarmService::ITERATION_DAYS);

        $this->info('За прошедший период собрано:');
        foreach ($farm->getAllProduction() as $class => $quantity) {
            $this->info($class::getProductionTitle() . ': '. $quantity);
        }



        pause('Для запуска следующей недели нажмите Enter');

        $this->info('Произведена закупка новых животных.');


        $farm->addAnimal(new Hen());
        $farm->addAnimal(new Hen());
        $farm->addAnimal(new Hen());
        $farm->addAnimal(new Hen());
        $farm->addAnimal(new Hen());
        $farm->addAnimal(new Cow());

        $this->info('Теперь на ферме есть следующие животные:');

        foreach($farm->getAnimalsByGroups() as $class => $quantity) {
            $this->info($class::getAnimalTitle().': '. $quantity.' голов');
        }


        $this->info('Начинается новая неделя, ждём '.FarmService::ITERATION_DAYS.' дней');
        $bar->start();
        for ($day = 1; $day<= FarmService::ITERATION_DAYS; $day++) {
            usleep(500000);
            $bar->advance();
        }
        $bar->finish();
        $this->newLine(2);


        $this->info('Прошла ещё неделя.');
        $this->info('Всего собрано продукции,включая первую неделю:');

        $farm->setProductionByDays(FarmService::ITERATION_DAYS);


        foreach ($farm->getAllProduction() as $class => $quantity) {
            $this->info($class::getProductionTitle() . ': '. $quantity);
        }

    }
}
