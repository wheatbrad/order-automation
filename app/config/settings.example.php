<?php

date_default_timezone_set('America/New_York');

define('APP_ROOT', dirname(__DIR__));
define('DS', DIRECTORY_SEPARATOR);


return [
    'smtp' => [
        'host' => 'smtp.example.com',
        'username' => 'example',
        'password' => 'example'
    ]
];