<?php

try {
    $app = (require __DIR__.'/config/bootstrap.php');

    if ($app->foundOrders()) {
        $app->processOrders();
        $app->sendOrders();
        $app->notifyPrintVendors();
    }
} catch (Throwable $e) {
    $app->notifyDevelopers($e);
}