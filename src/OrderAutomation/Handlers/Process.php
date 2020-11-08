<?php declare(strict_types=1);

namespace Ocozzio\OrderAutomation\Handlers;


class Process
{
    
    public static function packageOrders(String $path, Iterable $orders) : Void {}


    private static function packageOrder(String $path, Iterable $order) : Void {}


    private static function createReceipt(Iterable $order) : Iterable {}


    private static function removeDirectory(String $path) : Void {}
    
}