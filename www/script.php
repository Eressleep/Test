<?php

use DOM\Services\Сonverter\Action;

$autoloadPath = __DIR__.'/vendor/autoload.php';
require_once $autoloadPath;
echo '<pre>';
print_r($argv);
echo '</pre>';
exit();
(new Action)->run($argv);
