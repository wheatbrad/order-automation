<?php

date_default_timezone_set('America/New_York');

$appDirectory = dirname(__DIR__);

define('DIR_COMPLETE', $appDirectory . DIRECTORY_SEPARATOR . 'complete');
define('DIR_ORDERS', $appDirectory . DIRECTORY_SEPARATOR . 'orders');
define('DIR_ZIP', $appDirectory . DIRECTORY_SEPARATOR . 'zip');


require dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
$settings = (require __DIR__ . DIRECTORY_SEPARATOR . 'settings.php');


return new Ocozzio\OrderAutomation\Controller\AppController($settings);
