<?php declare(strict_types=1);

namespace Ocozzio\OrderAutomation\Handlers;


class Read
{

    public static Iterable $orderFiles;


    public static function checkForOrders(String $path) : Bool {}


    public static function readNewOrders() : Iterable {}


    private static function readOrderXML(String $orderXML) : Iterable {}
    
}