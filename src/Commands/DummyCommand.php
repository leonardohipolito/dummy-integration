<?php

namespace Facilita\Dummy\Commands;

use Illuminate\Console\Command;

class DummyCommand extends Command
{
    public $signature = 'dummy';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
