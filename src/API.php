<?php

namespace SMSAero;

use Illuminate\Support\Facades\Http;
use Throwable;

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
     * @return string
     */
    protected static function getURL()
    {
        if(self::$config == null) self::getConfig();
        return "https://" . self::$config['username'] . ":" . self::$config['password'] . "@" . self::$config['gate'];
    }

    /**
     * @return array
     */
    public static function auth()
    {
        if(self::$config == null) self::getConfig();

        $response = Http::get(self::getURL() . "/auth");
        return $response->json();
    }

    /**
     * @param string $sign
     * @param string $text
     * @param string $channel
     * @param string|null $number
     * @param array $numbers
     * @param int|null $dateSend
     * @param string|null $callbackUrl
     * @return array
     * @throws Throwable
     */
    public static function sendSMS(string $sign, string $text, string $channel, string $number = null, array $numbers = null, int $dateSend = null, string $callbackUrl = null)
    {
        if(self::$config == null) self::getConfig();

        $data = [];

        if($number != null)
            $data['number'] = $number;
        else if ($numbers != null)
            $data['numbers'] = $numbers;
        else
            die('You can choose between number and numbers!');

        throw_if($sign == null,'Sign is required!');
        $data['sign'] = $sign;

        throw_if($text == null,'Text is required!');
        $data['text'] = $text;

        throw_if($channel == null,'Channel is required!');
        $data['channel'] = $channel;

        if ($dateSend != null) $data['dateSend'] = $dateSend;
        if ($callbackUrl != null) $data['callbackUrl'] = $callbackUrl;

        return Http::post(self::getURL() . "/sms/send", $data)->json();
    }

    /**
     * @param int $id
     * @return array
     */
    public static function getSmsStatus(int $id)
    {
        if(self::$config == null) self::getConfig();

        $response = Http::get(self::getURL() . "/sms/status", ['id' => $id]);
        return $response->json();
    }

    /**
     * @param string|null $number
     * @param string|null $text
     * @param int|null $page
     * @return array
     */
    public static function getSmsList(string $number = null, string $text = null, int $page = null)
    {
        if(self::$config == null) self::getConfig();

        $data = [];

        if ($number) $data['number'] = $number;
        if ($text) $data['text'] = $text;
        if ($page) $data['page'] = $page;

        return Http::get(self::getURL() . "/sms/list", $data)->json();
    }

    /**
     * @return array
     */
    public static function getBalance()
    {
        if(self::$config == null) self::getConfig();
        return Http::get(self::getURL() . "/balance")->json();
    }

}