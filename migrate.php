<?php

use Symfony\Component\Console\Input\StringInput;
use Symfony\Component\Console\Output\ConsoleOutput;

$dependencyFactory = require __DIR__ . '/doctrine.php';

$cli = new Symfony\Component\Console\Application('Doctrine Migrations');
$cli->setCatchExceptions(true);
$cli->setAutoExit(false);

$cli->addCommands([
    new Doctrine\Migrations\Tools\Console\Command\MigrateCommand($dependencyFactory),
]);

$cli->run(new StringInput('migrations:migrate --no-interaction'), new ConsoleOutput());
