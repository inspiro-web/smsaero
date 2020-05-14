<?php

return [
    /*
     * Имя пользователя
     * Используется адрес электронной почты для авторизации на сервисе
     */
    'username' => env('SMSAERO_USERNAME', 'your@email.com'),

    /*
     * Пароль
     * Используется ключ API, который предоставляется при создании личного кабинета
     */
    'password' => env('SMSAERO_PASSWORD', 'replace-to-your-api-key'),

    /*
     * Гейт
     * Вспомогательный параметр для генерации пути запроса
     */
    'gate' => env('SMSAERO_GATE', 'gate.smsaero.ru/v2')
];