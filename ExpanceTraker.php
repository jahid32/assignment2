#!/usr/bin/env php

<?php
// application.php

require __DIR__.'/vendor/autoload.php';

use Symfony\Component\Console\Application;
use App\CliApp;

echo "Ho";
$application = new Application();
echo "Hi";
// $application->add();

// $application->run();
echo "Hs";
$app = new CliApp();
echo "Hx";
var_dump($app);

$app->run();
