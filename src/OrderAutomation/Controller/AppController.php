<?php declare(strict_type=1);

namespace Ocozzio\OrderAutomation\Controller;

use Ocozzio\OrderAutomation\Handlers\Read;
use Ocozzio\OrderAutomation\Handlers\Process;
use Ocozzio\OrderAutomation\Handlers\Send;
use Ocozzio\OrderAutomation\Handlers\Message;


class AppController
{

    function __construct() {}


    public function foundOrders() : Bool {}


    public function processOrders() : Void {}


    public function sendOrders() : Void {}


    public function notifyPrintVendors() : Void {}


    public function notifyDevelopers() : Void {}

}