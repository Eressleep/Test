<?php

use DOM\Services\Сonverter\Action;

$autoloadPath = __DIR__.'/vendor/autoload.php';
require_once $autoloadPath;
(new Action)->run($argv);
