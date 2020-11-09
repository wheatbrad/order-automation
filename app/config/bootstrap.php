<?php

date_default_timezone_set('America/New_York');

$appDirectory = dirname(__DIR__);

define('DS', DIRECTORY_SEPARATOR);
define('DIR_COMPLETE', $appDirectory . DS . 'complete');
define('DIR_ORDERS', $appDirectory . DS . 'orders');
define('DIR_ZIP', $appDirectory . DS . 'zip');


require dirname(__DIR__, 2) . DS . 'vendor' . DS . 'autoload.php';
$settings = (require __DIR__ . DS . 'settings.php');


return new Ocozzio\OrderAutomation\Controller\AppController();
