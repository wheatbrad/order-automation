<?php declare(strict_types=1);

namespace Ocozzio\OrderAutomation\Handlers;
namespace PHPMailer\PHPMailer;


class Message extends PHPMailer
{

    function __construct() {}
    
    
    public static function notifyDevelopers(String $message) : Void {}


    public static function notifyPrintVendors(Iterable $receipt) : Void {}


    public static function notifyVendor(Iterable $order) : Void {}


    private static function printShippingMethod(String $shippingMethod) : String {}

}