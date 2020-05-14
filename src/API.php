<?php

namespace SMSAero;

use Illuminate\Support\Facades\Http;

class API
{
    protected static $config;

    public function __get($name)
    {
        if($name == self::$config)
            return self::$config != null ? self::$config : self::getConfig();

        return $name;
    }

    /**
     * @param $name
     * @param $arguments
     */
    public static function __callStatic($name, $arguments)
    {
        if(self::$config == null)
            self::getConfig();
    }

    /**
     * @return array
     */
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
    }

    /**
     * @return array
     */
    public static function auth()
    {
        if(self::$config == null) self::getConfig();

        $response = Http::get("https://" . self::$config['username'] . ":" . self::$config['password'] . "@" . self::$config['gate'] . "/auth");
        return $response->json();
    }
}