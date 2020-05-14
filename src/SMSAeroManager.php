<?php

namespace SMSAero;

use Illuminate\Foundation\Application;

class SMSAeroManager
{
    protected $container;

    public function __construct()
    {
        $this->container = app();
    }
}
