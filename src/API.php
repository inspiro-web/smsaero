<?php

namespace SMSAero;

use Illuminate\Support\Facades\Http;

class API
{
    protected $username;
    protected $password;

    private $gate = "gate.smsaero.ru/v2";

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * @return array
     */
    public function auth(string $username, string $password)
    {
        if(!$this->username)
            $response = Http::get("https://" . $username . ":" . $password . "@" . $this->gate . "/auth");
        else
            $response = Http::get("https://" . $this->username . ":" . $this->password . "@" . $this->gate . "/auth");

        return $response->json();
    }
}