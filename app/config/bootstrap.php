<?php

require dirname(__DIR__, 2) . '/vendor/autoload.php';
$settings = (require 'settings.php');


return new Ocozzio\OrderAutomation\Controller\AppController();
