<?php declare(strict_types=1);

namespace Ocozzio\PFAutomation\Domain\OrderHandling;

use DirectoryIterator;
use RuntimeException;


class Send
{

    public static function sendOrders(iterable $settings) : void {
        foreach (new DirectoryIterator(DIR_ZIP) as $fileInfo) {
            if ($fileInfo->getExtension() === 'zip') {
                if (!$connection = @ftp_connect($settings['ftp_host'])) {
                    throw new RuntimeException(('Unable to connect to {vendor} FTP'));
                }
        
                if (!@ftp_login($connection, $settings['ftp_user'], $settings['ftp_password'])) {
                    throw new RuntimeException('Invalid credentials for {vendor} FTP connection');
                }
        
                ftp_pasv($connection, true);
        
                if (!ftp_chdir($connection, $settings['ftp_path'])) {
                    throw new RuntimeException('Unable to change path on {vendor} FTP');
                }
        
                if (!@ftp_put($connection, $fileInfo->getBasename(), $fileInfo->getPathname(), FTP_BINARY)) {
                    throw new RuntimeException('Unable to put {file} on {vendor} FTP');
                }

                rename($fileInfo->getPathname(), DIR_COMPLETE.$fileInfo->getBasename());

                ftp_close(($connection));
            }
        }
    }
    
}
