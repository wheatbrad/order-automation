<?php declare(strict_types=1);

namespace Ocozzio\OrderAutomation\Handlers;


class Read
{

    public static iterable $orderFiles = [];


    public static function checkForNewOrders(string $path) : bool {
        foreach(new \DirectoryIterator($path) as $fileInfo) {
            if ($fileInfo->getExtension() === 'xml') {
                self::$orderFiles[] = $fileInfo->getPathname();
            }
        }

        return (bool) self::$orderFiles;
    }


    public static function checkForOrphanedPackages(string $path) : bool {
        foreach (new \DirectoryIterator($path) as $fileInfo) {
            if ($fileInfo->getExtension() === 'zip') {
                return true;
            }
        }

        return false;
    }


    public static function readNewOrders() : iterable {
        $orders = [];

        foreach (self::$orderFiles as $file) {
            $orders[] = self::readOrderXML($file);
        }

        return $orders;
    }


    private static function readOrderXML(string $path) : iterable {
        return simplexml_load_file($path);
    }

}
