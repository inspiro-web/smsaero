<?php

namespace SMSAero;

use Illuminate\Foundation\Application;

/**
 * Class SMSAeroManager
 * @package SMSAero
 * @method static \SMSAero\API auth()
 */
class SMSAeroManager
{
    protected $container;

    public function __construct()
    {
        $this->container = app();
    }
}
