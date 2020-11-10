<?php declare(strict_types=1);

namespace Ocozzio\OrderAutomation\Controller;

use Ocozzio\OrderAutomation\Handlers\Read;
use Ocozzio\OrderAutomation\Handlers\Process;
use Ocozzio\OrderAutomation\Handlers\Send;
use Ocozzio\OrderAutomation\Handlers\Message;


class AppController
{

    function __construct() {
        if (!is_dir(DIR_COMPLETE)) {
            throw new \RuntimeException('Missing complete directory');
        }
        if (!is_dir(DIR_ORDERS)) {
            throw new \RuntimeException('Missing orders directory');
        }
        if (!is_dir(DIR_ZIP)) {
            throw new \RuntimeException('Missing zip directory');
        }
    }


    public function foundOrders() : bool {
        return (
            Read::checkForNewOrders(DIR_ORDERS) ||
            Read::checkForOrphanedPackages(DIR_ZIP)
        );
    }


    public function processOrders() : void {
        $orders = Read::readNewOrders();
    }


    public function sendOrders() : void {}


    public function notifyPrintVendors() : void {}


    public function notifyDevelopers() : void {}

}