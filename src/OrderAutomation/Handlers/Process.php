<?php declare(strict_types=1);

namespace Ocozzio\OrderAutomation\Handlers;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use RuntimeException;
use SimpleXMLElement;
use ZipArchive;


class Process
{
    
    public static function packageOrders(iterable $orders) : void {
        foreach ($orders as $order) {
            self::packageOrder($order);
        }
    }


    private static function packageOrder(SimpleXMLElement $order) : void {
        if ($order->Status === 'Rejected') {
            unlink(DIR_ORDERS . $order->OrderID.'xml');
            return;
        }

        $orderID = $order->OrderID;

        if (count($order->OrderItems)) {

            $zip = new ZipArchive();
            $zip->open(DIR_ZIP . $orderID . '.zip', ZipArchive::CREATE);
            $zip->addFile(DIR_ORDERS . $orderID . '.xml', $orderID . '.xml');

            foreach ($order->OrderItems as $item) {
                $itemID = $item->OrderItem->ExternalID;
                $file = $itemID . '_00001.pdf';

                if (!$zip->addFile(DIR_ORDERS . $orderID . DIRECTORY_SEPARATOR . $file, $orderID . '/' . $file)) {
                    throw new RuntimeException('Order <b>'.$orderID.'</b> is missing item <b>'.$itemID.'</b>');
                }
            }

            $zip->close();
            file_put_contents(DIR_ZIP.$order->OrderID.'.receipt', json_encode($order));
        }

        // Remove from DIR_ORDERS once packaged
        unlink(DIR_ORDERS . $orderID . '.xml');
        if (is_dir(DIR_ORDERS . $orderID)) {
            self::removeDirectory(DIR_ORDERS . $orderID);   
        }
    }


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