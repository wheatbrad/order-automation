<?php declare(strict_types=1);

namespace Ocozzio\OrderAutomation\Handlers;

use DirectoryIterator;


class Read
{

    /**
     * Check directory indicated by @param `$path` for XML order files
     *
     * @param string $path
     * @return iterable
     */
    public static function checkForNewOrders(string $path) : iterable {
        $orderFiles = [];
        foreach(new DirectoryIterator($path) as $fileInfo) {
            if ($fileInfo->getExtension() === 'xml') {
                $orderFiles[] = simplexml_load_file($fileInfo->getPathname());
            }
        }

        return $orderFiles;
    }


    /**
     * Check directory indicated by @param `$path` for zip files that were
     * not pushed onto vendor FTP
     *
     * @param string $path
     * @return boolean
     */
    public static function checkForOrphanedPackages(string $path) : bool {
        foreach (new DirectoryIterator($path) as $fileInfo) {
            if ($fileInfo->getExtension() === 'zip') {
                return true;
            }
        }

        return false;
    }

}
