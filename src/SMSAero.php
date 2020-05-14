<?php

namespace SMSAero;

use Illuminate\Support\Facades\Facade;

/**
 * Class SMSAero
 * @package SMSAero
 * @method static array auth()
 * @method static array sendSMS(string $sign, string $text, string $channel, string $number = null, array $numbers = null, int $dateSend = null, string $callbackUrl = null)
 * @method static array getSmsStatus(int $id)
 * @method static array getSmsList(string $number = null, string $text = null, int $page = null)
 * @method static array getBalance()
 * @see API
 */
class SMSAero extends Facade
{
    /**
     * @return string
     */
    public static function getFacadeAccessor()
    {
        return 'smsaero';
    }
}
