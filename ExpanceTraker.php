#!/usr/bin/env php

<?php
// application.php

require __DIR__.'/vendor/autoload.php';

use Symfony\Component\Console\Application;
use ExpanceTraker\CliApp;



$application = new Application();

// $application->add();

// $application->run();

$app = new CliApp();

var_dump($app);

$app->run();
