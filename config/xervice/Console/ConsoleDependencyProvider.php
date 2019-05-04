<?php

namespace App\Console;

use Xervice\Console\ConsoleDependencyProvider as XerviceConsoleDependencyProvider;
use Xervice\DataProvider\Communication\Console\CleanCommand;
use Xervice\DataProvider\Communication\Console\GenerateCommand;

class ConsoleDependencyProvider extends XerviceConsoleDependencyProvider
{
    /**
     * @return array
     */
    protected function getCommandList(): array
    {
        return [
            new CleanCommand(),
            new GenerateCommand()
        ];
    }
}
