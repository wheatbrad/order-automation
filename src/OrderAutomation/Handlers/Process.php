<?php declare(strict_types=1);

namespace Ocozzio\OrderAutomation\Handlers;


class Process
{
    
    public static function packageOrders(iterable $orders) : void {
        foreach ($orders as $order) {
            self::packageOrder($order);
        }
    }


    private static function packageOrder(iterable $order) : void {}


    private static function createReceipt(iterable $order) : iterable {}


    private static function removeDirectory(string $path) : void {}
    
}