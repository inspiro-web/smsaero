<?php

namespace SMSAero;

use Illuminate\Support\Facades\Facade;

/**
 * Class SMSAero
 * @package SMSAero
 * @method static \SMSAero\API auth()
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
