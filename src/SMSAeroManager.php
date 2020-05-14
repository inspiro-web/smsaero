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

    /**
     * @param $username
     * @param $password
     * @return array
     */
    public function callAuth($username, $password)
    {
        $api = new API($username, $password);
        return $api->auth();
    }
}
