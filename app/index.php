<?php

try {
    $app = (require __DIR__ . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'bootstrap.php');

    if ($app->foundOrders()) {
        $app->processOrders();
        $app->sendOrders();
        $app->notifyPrintVendors();
    }
} catch (Throwable $e) {
    $app->notifyDevelopers($e);
}