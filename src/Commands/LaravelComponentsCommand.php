<?php

namespace JordenPowleyWebDev\LaravelComponents\Commands;

use Illuminate\Console\Command;

class LaravelComponentsCommand extends Command
{
    public $signature = 'laravel-components';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
