#!/usr/bin/env php

<?php
// application.php

require __DIR__.'/vendor/autoload.php';

use ExpanceTraker\CliApp;


$app = new CliApp();

var_dump($app);

$app->run();
