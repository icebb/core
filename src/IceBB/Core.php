<?php

namespace IceBB;

use Illuminate\Support\Facades\Facade;
use Config;

class Core extends Facade
{
    protected static function getFacadeAccessor()
    {
        return static::$app;
    }

    public static function isInstalled()
    {
        $app = static::$app;
        return file_exists($app['path'].'/config/icebb.php');
    }

    public static function version()
    {
        return '2.0.0-alpha1';
    }
}
