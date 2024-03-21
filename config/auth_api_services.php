<?php

return [
    'login' => [
        'method' => 'GET',
        'parameters' => ['email', 'password'],
        'response' => [
            'success' => [
                'token_type' => 'Bearer',
                'token' => null,
                'error' => false,
                'code' => 0
            ],
            'error' => [
                "error" => true,
                "code" => 1
            ],
        ],
    ]
];
