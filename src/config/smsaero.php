<?php

return [
    'username' => env('SMSAERO_USERNAME', 'test@mail.com'),
    'password' => env('SMSAERO_PASSWORD', null),
    'gate' => env('SMSAERO_GATE', 'gate.smsaero.ru/v2')
];