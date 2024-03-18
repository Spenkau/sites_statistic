<?php

$headers = [
    'Accept' => 'application/json',
    'Authorization' => 'Bearer {TOKEN}'
];

return [
    'login' => [
        'method' => 'GET',
        'parameters' => ['email', 'password'],
        'response' => [
            'success' => [
                'token_type' => 'Bearer',
                'token' => 'SOME TOKEN',
                'error' => false,
                'code' => 0
            ],
            'error' => [
                "error" => true,
                "code" => 1
            ],
        ],
    ],
    'products' => [
        'method' => 'GET',
        'parameters' => ['type_id', 'page', 'update_from', 'update_to'],
        'headers' => $headers,
        'response' => [
            'success' => [
                'error',
                'code',
                'count',
                'page',
                'pages',
                'items' => [
                    'id',
                    'name',
                    'description',
                    'text',
                    'priority',
                    'validity',
                    'user_id',
                    'images',
                    'prices' => [['product_type', 'quantity', 'price']]
                ]

            ],
            'error' => ['error', 'code']
        ]
    ],
    'options' => [
        'method' => 'GET',
        'headers' => $headers,
        'response' => [
            'success' => [
                'error',
                'code',
                'data' => ['id', 'name', 'price']
            ],
            'error' => [
                'error',
                'code'
            ]
        ]
    ],
    'buy' => [
        'method' => 'POST',
        'parameters' => ['product_id', 'price', 'type_id', 'product_type', 'quantity', 'email', 'external_id'],
        'headers' => $headers,
        'response' => [
            'success' => ['orderId', 'error', 'code'],
            'error' => ['error' => true, 'code' => 5]
        ],
    ],
    'orderStatus' => [
        'method' => 'GET',
        'parameters' => ['order_id'],
        'headers' => $headers,
        'response' => [
            'success' => ['status', 'order_id', 'resource', 'external_id'],
            'error' => ['error' => true, 'code' => 10]
        ]
    ],
    'orders' => [
        'method' => 'GET',
        'parameters' => ['page', 'date_from', 'date_to', 'update_from', 'update_to'],
        'headers' => $headers,
        'response' => [
            'success' => ['code', 'count', 'page', 'pages', 'order_item', 'product_type', 'pull_card_id', 'supplier_id', 'date', 'type_id', 'item_id', 'quantity', 'nominal', 'number', 'price', 'status', 'payment_method_id', 'send_date'],
            'error' => ['error' => true, 'code' => 10]
        ]
    ],
    'ordersAll' => [
        'method' => 'GET',
        'parameters' => ['page', 'date_from', 'date_to', 'update_from', 'update_to'],
        'headers' => $headers,
        'response' => [
            'success' => ['code', 'count', 'page', 'pages', 'order_item', 'product_type', 'pull_card_id', 'supplier_id', 'date', 'type_id', 'item_id', 'quantity', 'nominal', 'number', 'price', 'status', 'payment_method_id', 'send_date', 'type_of_space', 'type_of_space_item_id'],
            'error' => ['error' => true, 'code' => 14]
        ]
    ],
    'transactions' => [
        'method' => 'GET',
        'parameters' => ['page', 'date_from', 'date_to', 'update_from', 'update_to'],
        'headers' => $headers,
        'response' => [
            'success' => ['code', 'count', 'page', 'pages', 'replenishment_id', 'type', 'status', 'operation', 'date', 'type_of_space', 'type_of_space_item_id'],
            'error' => ['error' => true, 'code' => 14]
        ]
    ],
    'pull' => [
        'method' => 'GET',
        'parameters' => ['id', 'validity_from', 'validity_to', 'activation_from', 'activation_to', 'disable_from', 'disable_to', 'type_id', 'page', 'date_from', 'date_to', 'update_from', 'update_to'],
        'headers' => $headers,
        'response' => [
            'success' => ['code', 'code', 'supplier_id', 'page', 'pages', 'user_balance_id', 'status', 'type_id', 'item_id'],
            'error' => ['error' => true, 'code' => 11]
        ]
    ],
    'users' => [
        'method' => 'GET',
        'parameters' => ['page', 'update_from', 'update_to'],
        'headers' => $headers,
        'response' => [
            'success' => ['error', 'code', 'count', 'page', 'pages', 'data',],
            'error' => ['error' => true, 'code' => 11]
        ]
    ],
    'roles' => [
        'method' => 'GET',
        'parameters' => ['error', 'code', 'data'],
        'headers' => $headers,
        'response' => [
            'success' => [],
            'error' => []
        ]
    ],
    'suppliers' => [
        [
            'method' => 'POST',
            'parameters' => ['code', 'code_1c', 'name', 'inn'],
            'headers' => $headers,
            'response' => [
                'success' => ['error', 'code'],
                'error' => ['error', 'code']
            ]
        ],
        [
            'method' => 'GET',
            'parameters' => ['code', 'code_1c', 'name', 'inn'],
            'response' => [
                'success' => ['error', 'code'],
                'error' => ['error', 'code']
            ]
        ]
    ],
    'balance' => [
        'method' => 'GET',
        'parameters' => [],
        'headers' => $headers,
        'response' => [
            'success' => ['error', 'code', 'value'],
            'error' => ['error', 'code']
        ]
    ],
    'type' => [
        'method' => '',
        'parameters' => [],
        'headers' => $headers,
        'response' => [
            'success' => ['error', 'code', 'data'],
            'error' => ['error', 'code']
        ]
    ],
    'mobileReplenishments' => [
        'method' => 'GET',
        'parameters' => ['page', 'date_from', 'date_to', 'update_from', 'update_to'],
        'headers' => $headers,
        'response' => [
            'success' => ['error', 'code', 'count', 'page', 'pages', 'data'],
            'error' => ['error', 'code']
        ]
    ],
    'showcaseCompany' => [
        'method' => 'GET',
        'parameters' => [],
        'headers' => $headers,
        'response' => [
            'success' => ['error', 'code', 'data'],
            'error' => ['error', 'code']
        ]
    ],
    'ndfl' => [
        'method' => 'GET',
        'parameters' => [],
        'headers' => $headers,
        'response' => [
            'success' => ['error', 'code', 'page', 'pages'],
            'error' => ['error', 'code']
        ]
    ],
    'getAllJuridicalOrders' => [
        'method' => 'GET',
        'parameters' => [],
        'headers' => $headers,
        'response' => [
            'success' => ['error', 'code', 'data'],
            'error' => ['error', 'code']
        ]
    ],
    'findJuridicalPerson' => [
        'method' => 'GET',
        'parameters' => ['contractor_id'],
        'headers' => $headers,
        'response' => [
            'success' => ['error', 'code', 'data'],
            'error' => ['error', 'code']
        ]
    ],
    'createJuridicalPerson' => [
        'method' => 'POST',
        'parameters' => ['contractor_id', 'name', 'inn'],
        'headers' => $headers,
        'response' => [
            'success' => ['error', 'code', 'data'],
            'error' => ['error', 'code']
        ]
    ],
    'createJuridicalOrder' => [
        'method' => 'POST',
        'parameters' => ['contractor_id', 'number_order_1c', 'created_at_1c'],
        'headers' => $headers,
        'response' => [
            'success' => ['error', 'code', 'data'],
            'error' => ['error', 'code']
        ]
    ],
    'getMobileReplenishmentPaymentTypes' => [
        'method' => 'GET',
        'parameters' => [],
        'headers' => $headers,
        'response' => [
            'success' => ['error', 'code', 'data'],
            'error' => ['error', 'code']
        ]
    ],
    'createMobileReplenishment' => [
        [
            'method' => 'GET',
            'parameters' => ['payment_id'],
            'headers' => $headers,
            'response' => [
                'success' => ['payment_id', 'error', 'code'],
                'error' => ['error', 'code']
            ],
        ],
        [
            'method' => 'POST',
            'parameters' => ['number', 'amount', 'payment_type'],
            'headers' => $headers,
            'response' => [
                'success' => ['payment_id', 'error', 'code'],
                'error' => ['error', 'code']
            ]
        ]
    ],
];
