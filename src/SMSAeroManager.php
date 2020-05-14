<?php

namespace SMSAero;

use Illuminate\Foundation\Application;

/**
 * Class SMSAeroManager
 * @package SMSAero
 * @method array auth(string $username, string $password)
 */
class SMSAeroManager
{
    protected $container;

    public function __construct()
    {
        $this->container = app();
    }
}
