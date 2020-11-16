<?php declare(strict_types=1);

namespace Ocozzio\OrderAutomation\Handlers;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use SimpleXMLElement;
use ZipArchive;


class Process
{
    
    public static function packageOrders(iterable $orders) : void {
        foreach ($orders as $order) {
            self::packageOrder($order);
        }
    }


    private static function packageOrder(SimpleXMLElement $order) : void {}


    private static function createReceipt(iterable $order) : iterable {}


    private static function removeDirectory(string $path) : void {
        $directory = new RecursiveDirectoryIterator($path, RecursiveDirectoryIterator::SKIP_DOTS);
        $iterator = new RecursiveIteratorIterator($directory, RecursiveIteratorIterator::CHILD_FIRST);

        foreach($iterator as $info) {
            if ($info->isDir()) {
                rmdir($info->getPathname());
            } else {
                unlink($info->getPathname());
            }
        }

        rmdir($path);
    }
    
}