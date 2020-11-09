<?php declare(strict_types=1);

namespace Ocozzio\OrderAutomation\Handlers;


class Read
{

    public static Iterable $orderFiles;


    public static function checkForNewOrders(String $path) : Bool {
        $files = [];
        
        foreach(new \DirectoryIterator($path) as $fileInfo) {
            if ($fileInfo->getExtension() === 'xml') {
                $files[] = $fileInfo->getPathname();
            }
        }

        return (bool) $files;
    }


    public static function checkForOrphanedPackages(String $path) : Bool {
        foreach (new \DirectoryIterator($path) as $fileInfo) {
            if ($fileInfo->getExtension() === 'zip') {
                return true;
            }
        }

        return false;
    }


    public static function readNewOrders() : Iterable {}


    private static function readOrderXML(String $orderXML) : Iterable {}
    
}