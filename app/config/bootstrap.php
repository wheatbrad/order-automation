<?php

date_default_timezone_set('America/New_York');

define('APP_ROOT', dirname(__DIR__));
define('DS', DIRECTORY_SEPARATOR);


require dirname(__DIR__, 2) . '/vendor/autoload.php';
$settings = (require 'settings.php');


return new Ocozzio\OrderAutomation\Controller\AppController();
