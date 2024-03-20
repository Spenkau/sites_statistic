<?php

$headers = [
    'Accept' => 'application/json',
    'Authorization' => 'Bearer $apiHistoryTOKEN]'
];

return [
    'products' => [
        'method' => 'GET',
        'parameters' => ['type_id' => 1, 'page' => 1, 'update_from' => null, 'update_to' => null],
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
        'parameters' => ['product_id' => 2000, 'price' => 2500, 'type_id' => 1, 'product_type' => 2, 'quantity' => 1, 'email' => null, 'external_id' => null],
        'headers' => $headers,
        'response' => [
            'success' => ['orderId', 'error', 'code'],
            'error' => ['error' => true, 'code' => 5]
        ],
    ],
    'orderStatus' => [
        'method' => 'GET',
        'parameters' => ['order_id' => 10],
        'headers' => $headers,
        'response' => [
            'success' => ['status', 'order_id', 'resource', 'external_id'],
            'error' => ['error' => true, 'code' => 10]
        ]
    ],
    'orders' => [
        'method' => 'GET',
        'parameters' => ['page' => null, 'date_from' => null, 'date_to' => null, 'update_from' => null, 'update_to' => null],
        'headers' => $headers,
        'response' => [
            'success' => [
                'error',
                'code',
                'count',
                'page',
                'pages',
                'orders' => [
                    'id',
                    'price',
                    'order_item' => [
                        'type_id',
                        'item_id',
                        'quantity',
                        'nominal',
                        'number',
                        'price',
                        'resource',
                        'product_type',
                        'pull_card_id',
                        'supplier_id',
                        'date',
                        'send_date'
                    ]
                ],
            ],
            'error' => ['error' => true, 'code' => 10]
        ]
    ],
    'ordersAll' => [
        'method' => 'GET',
        'parameters' => ['page' => 1, 'date_from' => null, 'date_to' => null, 'update_from' => null, 'update_to' => null],
        'headers' => $headers,
        'response' => [
            'success' => [
                'error',
                'code',
                'count',
                'page',
                'pages',
                'orders' => [
                    'id',
                    'user_id',
                    'status',
                    'payment_method_id',
                    'price',
                    'order_item' => [
                        'type_id',
                        'item_id',
                        'quantity',
                        'product_type',
                        'price',
                        'nominal',
                        'number',
                        'product_type',
                        'pull_card_id',
                        'supplier_id',
                        'date',
                        'type_of_space',
                        'type_of_space_item_id',
                        'send_date'
                    ]
                ],
                'code', 'count', 'page', 'pages', 'order_item', 'product_type', 'pull_card_id',
                'supplier_id', 'date', 'type_id', 'item_id', 'quantity', 'nominal', 'number',
                'price', 'status', 'payment_method_id', 'send_date', 'type_of_space', 'type_of_space_item_id'
            ],
            'error' => ['error' => true, 'code' => 14]
        ]
    ],
    'transactions' => [
        'method' => 'GET',
        'parameters' => ['page' => null, 'date_from' => null, 'date_to' => null, 'update_from' => null, 'update_to' => null],
        'headers' => $headers,
        'response' => [
            'success' => [
                'error',
                'code',
                'count',
                'page',
                'pages',
                'data' => [
                    'id',
                    'user_id',
                    'order_id',
                    'replenishment_id',
                    'type',
                    'status',
                    'operation',
                    'comment',
                    'showcase_company_id',
                    'date',
                    'updated_at',
                    'type_of_space_item_id',
                    'type_of_space'
                ],
                'error' => ['error' => true, 'code' => 14]
            ]
        ],
    ],
    'pull' => [
        'method' => 'GET',
        'parameters' => [
            'id', 'validity_from', 'validity_to', 'activation_from', 'activation_to',
            'disable_from', 'disable_to', 'type_id', 'page', 'date_from', 'date_to', 'update_from', 'update_to'
        ],
        'headers' => $headers,
        'response' => [
            'success' => [
                'code', 'code', 'supplier_id', 'page', 'pages', 'user_balance_id', 'status', 'type_id', 'item_id'
            ],
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
        'method' => 'GET',
        'parameters' => [],
        'headers' => $headers,
        'response' => [
            "success" => [
                "error" => false,
                "code" => 0,
                "data" => [
                    [
                        "id" => 1,
                        "name" => "certificate"
                    ],
                    [
                        "id" => 2,
                        "name" => "adventure"
                    ]
                ]
            ],
            "error" => [
                "error" => true,
                "code" => 11
            ]

        ]
    ],
    'mobileReplenishments' => [
        'method' => 'GET',
        'parameters' => ['page', 'date_from', 'date_to', 'update_from', 'update_to'],
        'headers' => $headers,
        'response' => [
            "success" => [
                "error" => false,
                "code" => 0,
                "count" => 3,
                "page" => 1,
                "pages" => 1,
                "data" => [[
                    "id" => 1,
                    "user_id" => "1",
                    "number" => "+70000000391",
                    "sum" => "18",
                    "total_sum" => "20",
                    "commission" => "15",
                    "status" => "2",
                    "wallet" => "PHONE",
                    "comment" => "Подтверждение! Пополнение с каталога УК",
                    "showcase_company_id" => 2
                ], [
                    "id" => 2,
                    "user_id" => "1",
                    "number" => "410000000000000",
                    "sum" => "18",
                    "total_sum" => "20",
                    "commission" => "15",
                    "status" => "1",
                    "wallet" => "YA",
                    "comment" => "Подтверждение! Пополнение с каталога УК",
                    "showcase_company_id" => 2
                ]]
            ],
            "error" => [
                "error" => true,
                "code" => 11
            ]
        ],
    ],
    'showcaseCompany' => [
        'method' => 'GET',
        'parameters' => [],
        'headers' => $headers,
        'response' => [
            "error" => false,
            "code" => 0,
            "data" => [[
                "id" => 1,
                "name" => "certificate"
            ], [
                "id" => 2,
                "name" => "adventure"
            ]]
        ]

    ],
    'ndfl' => [
        'method' => 'GET',
        'parameters' => [],
        'headers' => $headers,
        'response' => [
            'success' => [
                "error" => false,
                "code" => 0,
                "count" => 3,
                "page" => 1,
                "pages" => 1,
                "data" => [[
                    "id" => 2,
                    "name" => "Иван",
                    "surname" => "Иванов",
                    "lastname" => "Иванович",
                    "datebirth" => "1965-11-11",
                    "phone" => " + 7 (910) 111-11-11",
                    "email" => "111111111@inbox.ru",
                    "inn" => "111111111",
                    "snils" => "111111111",
                    "passport_serries" => "111111111",
                    "passport_number" => "111111111",
                    "issued_by" => "Тест",
                    "departament_code" => "000 - 000",
                    "when_issued" => "2011-11-11",
                    "address" => "Тест", "user_id" => 123123,
                    "showcase_company_id" => 16,
                    "comment" => null,
                    "acts" => null,
                    "create_date" => "2021-02-02 12=>37=>46",
                    "update_date" => "2021-02-02 12=>37=>49"
                ], [
                    "id" => 3,
                    "name" => "Иван",
                    "surname" => "Иванов",
                    "lastname" => "Иванович",
                    "datebirth" => "1965-11-11",
                    "phone" => "+7 (910) 111-11-11",
                    "email" => "111111111@inbox.ru",
                    "inn" => "111111111",
                    "snils" => "111111111",
                    "passport_serries" => "111111111",
                    "passport_number" => "111111111",
                    "issued_by" => "Тест",
                    "departament_code" => "000-000",
                    "when_issued" => "2011-11-11",
                    "address" => "Тест",
                    "user_id" => 123123
                    ,
                    "showcase_company_id" => 16,
                    "comment" => null,
                    "acts" => null,
                    "create_date" => "2021 - 02 - 02 12=>37=>46",
                    "update_date" => "2021 - 02 - 02 12=>37=>49"
                ]]],
            'error' => ['error', 'code']
        ]
    ],
    'getAllJuridicalOrders' => [
        'method' => 'GET',
        'parameters' => [],
        'headers' => $headers,
        'response' => [
            'success' => [
                "error" => false,
                "code" => 0,
                "data" => [
                    [
                        "id" => 1,
                        "number_order_1c" => "2423-222",
                        "created_at_1c" => "2021-10-22 00=>00=>00",
                        "total_price" => "6300.00",
                        "status" => 9,
                        "contractor_id" => "1",
                        "juridical_order_items" => []
                    ],
                    [
                        "id" => 6,
                        "number_order_1c" => "2423222",
                        "created_at_1c" => "2021-11-02 00=>00=>00",
                        "total_price" => "70480.00",
                        "status" => 9,
                        "contractor_id" => null,
                        "juridical_order_items" => [
                            [
                                "juridical_order_id" => 6,
                                "type_id" => 1,
                                "item_id" => 1687,
                                "quantity" => 1,
                                "price" => 300,
                                "status" => 11,
                                "pull_id" => 202
                            ]
                        ]
                    ],
                    'error' => [
                        "error" => true,
                        "code" => 11
                    ]
                ]
            ],
            'findJuridicalPerson' => [
                'method' => 'GET',
                'parameters' => ['contractor_id'],
                'headers' => $headers,
                'response' => [
                    'success' => ["error" => false,
                        "code" => 0,
                        "data" => [
                            "id" => 1,
                            "contractor_id" => "1",
                            "name" => "Название Организации",
                            "email" => "email@email.ru",
                            "phone" => "+71111111111",
                            "inn" => "5434234252",
                            "kpp" => null,
                            "comment" => null,
                            "created_at" => "2021-10-20 00=>54=>35",
                            "updated_at" => "2021-10-20 00=>54=>35"
                        ]
                    ],
                    'error' => [
                        "error" => true,
                        "code" => 11
                    ]
                ]
            ],
            'createJuridicalPerson' => [
                'method' => 'POST',
                'parameters' => ['contractor_id', 'name', 'inn'],
                'headers' => $headers,
                'response' => [
                    'success' => [
                        "error" => false,
                        "code" => 0,
                        "data" => [
                            "contractor_id" => "432",
                            "name" => "Название организации",
                            "inn" => "4546553",
                            "updated_at" => "2022-01-13 10=>29=>22",
                            "created_at" => "2022-01-13 10=>29=>22",
                            "id" => 31
                        ]
                    ],
                    'error' => [
                        "error" => true,
                        "code" => 11
                    ]

                ]
            ],
            'createJuridicalOrder' => [
                'method' => 'POST',
                'parameters' => ['contractor_id', 'number_order_1c', 'created_at_1c'],
                'headers' => $headers,
                'response' => [
                    'success' => [
                        "error" => false,
                        "code" => 0,
                        "data" => [
                            "number_order_1c" => "232",
                            "created_at_1c" => "2022-12-01",
                            "juridical_person_id" => 31,
                            "total_price" => 0,
                            "status" => 1,
                            "updated_at" => "2022-01-13 10=>36=>59",
                            "created_at" => "2022-01-13 10=>36=>59",
                            "id" => 23
                        ]
                    ],
                    'error' => [
                        "error" => true,
                        "code" => 11
                    ]
                ]
            ],
            'getMobileReplenishmentPaymentTypes' => [
                'method' => 'GET',
                'parameters' => [],
                'headers' => $headers,
                'response' => [
                    'success' => [
                        "error" => false,
                        "code" => 0,
                        "data" => [
                            [
                                "payment_type" => "PHONE",
                                "comment" => "Мобильные платежи"
                            ],
                            [
                                "payment_type" => "BANK_CARD",
                                "comment" => "Платежи на банковскую карту"
                            ]
                        ]
                    ],
                    'error' => [
                        "error" => true,
                        "code" => 11
                    ]

                ]
            ],
            'createMobileReplenishment' => [
                [
                    'method' => 'GET',
                    'parameters' => ['payment_id'],
                    'headers' => $headers,
                    'response' => [
                        'success' => [
                            "error" => "false",
                            "code" => 0,
                            "data" => [
                                "status" => 1,
                                "payment_code" => null,
                                "sum" => 73,
                                "payment_type" => "phone",
                                "comment" => "Ожидает проводки"
                            ]
                        ],
                        'error' => [
                            "error" => true,
                            "code" => 11
                        ]
                    ],
                ],
                [
                    'method' => 'POST',
                    'parameters' => ['number', 'amount', 'payment_type'],
                    'headers' => $headers,
                    'response' => [
                        'success' => [
                            "payment_id" => 204,
                            "error" => "false",
                            "code" => 0
                        ],
                        'error' => [
                            "error" => true,
                            "code" => 11
                        ]
                    ]
                ]
            ],
        ],
    ],
];
