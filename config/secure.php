<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Security Configuration
    |--------------------------------------------------------------------------
    |
    | Load them from env to config, preventing cache problems
    |
    */
    'cipher' => env('PWD_METHOD', 'SALTED2MD5'),
    'salt'   => env('SALT', ''),
];
