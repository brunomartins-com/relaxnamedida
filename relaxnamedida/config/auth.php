<?php

return [

    'multi'    => [
        'admin' => [
            'driver' => 'eloquent',
            'model'  => App\Domains\User::class,
            'table'  => 'users',
        ],
        'users' => [
            'driver' => 'eloquent',
            'model'  => App\Domains\Participant::class,
            'table'  => 'contestants',
        ],
    ],

    'password' => [
        'email'  => 'emails.password',
        'table'  => 'password_resets',
        'expire' => 60,
    ],

];
