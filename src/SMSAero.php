<?php

namespace SMSAero;

use Illuminate\Support\Facades\Facade;

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
