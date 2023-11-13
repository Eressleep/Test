<?php
$autoloadPath = __DIR__.'/vendor/autoload.php';
require_once $autoloadPath;


(new \DOM\Services\Сonverter\Action)->run($argv);
