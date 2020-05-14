<?php

namespace SMSAero;

use Illuminate\Support\Facades\Http;

class API
{
    protected static $config;

    /**
     * @param $name
     * @param $arguments
     */
    public static function __callStatic($name, $arguments)
    {
        if(self::$config == null)
        {
            self::$config = [
                'username' => config('smsaero.username'),
                'password' => config('smsaero.password'),
                'gate' => config('smsaero.gate')
            ];
        }
    }

/*
    protected static function getConfig()
    {
        if(self::$config == null)
        {
            self::$config = [
                'username' => config('smsaero.username'),
                'password' => config('smsaero.password'),
                'gate' => config('smsaero.gate')
            ];
        }

        return self::$config;
    }*/

    /**
     * @return array
     */
    public static function auth()
    {
        $response = Http::get("https://" . self::$config['username'] . ":" . self::$config['password'] . "@" . self::$config['gate'] . "/auth");
        return $response->json();
    }
}