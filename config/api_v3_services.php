<?php

return [
    'products' => [
        'method' => 'GET',
        'parameters' => ['type_id' => 1, 'page' => 1, 'update_from' => null, 'update_to' => null],
        'response' => [
            'success' => [
                [
                    "error" => false,
                    "code" => 0,
                    "count" => 3,
                    "page" => 1,
                    "pages" => 1,
                    "items" => [
                        "id" => 1,
                        "name" => "Предоплаченные банковские карты",
                        "description" => "<p>&nbsp;<\/p>",
                        "text" => "<p>&nbsp;<\/p>",
                        "priority" => 144,
                        "validity" => 12,
                        "user_id" => 3112,
                        "images" => ["http://site.vp/das.jpg"],
                        "prices" => [
                            [
                                "product_type" => 1,
                                "quantity" => null,
                                "price" => 600
                            ],
                            [
                                "product_type" => 2,
                                "quantity" => null,
                                "price" => 1200
                            ],
                            [
                                "product_type" => 1,
                                "quantity" => null,
                                "price" => 500
                            ],
                            [
                                "product_type" => 2,
                                "quantity" => null,
                                "price" => 1331
                            ],
                            [
                                "product_type" => 2,
                                "quantity" => null,
                                "price" => 2111
                            ],
                            [
                                "product_type" => 2,
                                "quantity" => null,
                                "price" => 1222
                            ],
                            [
                                "product_type" => 1,
                                "quantity" => null,
                                "price" => 50
                            ]
                        ],
                        [
                            "id" => 4,
                            "name" => "Подарочный сертификат Reebok",
                            "description" => "<p>&nbsp;<\/p>",
                            "text" => "<p>&nbsp;<\/p>",
                            "priority" => 3,
                            "validity" => 12,
                            "quantity" => 4,
                            "prices" => [
                                [
                                    "product_type" => 2,
                                    "price" => 1200,
                                    "quantity" => 1
                                ],
                                [
                                    "product_type" => 2,
                                    "price" => 1300,
                                    "quantity" => 3
                                ]
                            ]
                        ]
                    ],
                ],
                'error' => ['error' => true, 'code' => 11]
            ]
        ],
    ],
    'options' => [
        'method' => 'GET',
        'response' => [
            'success' => [
                "error" => false,
                "code" => 0,
                "data" => [
                    [
                        "id" => 1,
                        "name" => "30 минут",
                        "price" => 1200
                    ],
                    [
                        "id" => 2,
                        "name" => "40 минут",
                        "price" => 1800
                    ]
                ]
            ]
            ,
            'error' => [
                'error' => true,
                'code' => 5
            ]
        ]
    ],
    'buy' => [
        'method' => 'POST',
        'parameters' => [
            'product_id' => 2000,
            'price' => 2500,
            'type_id' => 1,
            'product_type' => 2,
            'quantity' => 1,
            'email' => null,
            'external_id' => null
        ],
        'response' => [
            'success' => ['orderId' => 204, 'error' => false, 'code' => 0],
            'error' => ['error' => true, 'code' => 5]
        ],
    ],
    'orderStatus' => [
        'method' => 'GET',
        'parameters' => ['order_id' => 10],
        'response' => [
            'success' => ['status' => 1, 'order_id' => 204, 'resource' => [null], 'error' => false, 'code' => 0, 'external_id' => 73],
            'error' => ['error' => true, 'code' => 10]
        ]
    ],
    'orders' => [
        'method' => 'GET',
        'parameters' => [
            'page' => null,
            'date_from' => null,
            'date_to' => null,
            'update_from' => null,
            'update_to' => null
        ],
        'response' => [
            'success' => [
                "error" => false,
                "code" => 0,
                "count" => 3,
                "page" => 1,
                "pages" => 1,
                "orders" => [
                    [
                        "id" => 196,
                        "price" => 3600,
                        "order_item" => [
                            [
                                "type_id" => 1,
                                "item_id" => 2,
                                "quantity" => 1,
                                "nominal" => 1200,
                                "number" => '1231231123',
                                "price" => 1200,
                                "resource" => [
                                    "site.ru/file.pdf"
                                ],
                                "product_type" => 1,
                                "pull_card_id" => 1,
                                "supplier_id" => 1,
                                "date" => 1,
                                "send_date" => 1,
                            ]
                        ]
                    ],
                    [
                        "id" => 197,
                        "price" => 5200,
                        "order_item" => [
                            [
                                "type_id" => 1,
                                "item_id" => 1,
                                "quantity" => 4,
                                "nominal" => 1200,
                                "price" => 1300,
                                "resource" => [
                                    "site.ru/file.pdf",
                                    "site.ru/file.pdf",
                                    "site.ru/file.pdf",
                                    "site.ru/file.pdf"
                                ],
                                "product_type" => 1,
                                "pull_card_id" => 1,
                                "supplier_id" => 1,
                                "date" => 1
                            ]
                        ]
                    ]
                ]
            ]
            ,
            'error' => ['error' => true, 'code' => 10]
        ]
    ],
    'ordersAll' => [
        'method' => 'GET',
        'parameters' => [
            'page' => 1,
            'date_from' => null,
            'date_to' => null,
            'update_from' => null,
            'update_to' => null
        ],
        'response' => [
            'success' => [
                "error" => false,
                "code" => 0,
                "count" => 3,
                "page" => 1,
                "pages" => 1,
                "orders" => [
                    [
                        "id" => 1,
                        "user_id" => 5811,
                        "status" => 1,
                        "payment_method_id" => 1,
                        "price" => 550,
                        "order_item" => [
                            [
                                "type_id" => 1,
                                "item_id" => 1,
                                "quantity" => 1,
                                "price" => 550,
                                "nominal" => 550,
                                "number" => '1231231123',
                                "product_type" => 1,
                                "pull_card_id" => 1,
                                "supplier_id" => 1,
                                "date" => 1,
                                "type_of_space" => 1,
                                "type_of_space_item_id" => 'site',
                                "send_date" => 1
                            ]
                        ]
                    ],
                    [
                        "id" => 2,
                        "user_id" => 5811,
                        "status" => 1,
                        "payment_method_id" => 1,
                        "price" => 300,
                        "order_item" => [
                            [
                                "type_id" => 1,
                                "item_id" => 3,
                                "quantity" => 1,
                                "price" => 300,
                                "nominal" => 550,
                                "number" => '1231231123',
                                "product_type" => 1,
                                "pull_card_id" => 1,
                                "supplier_id" => 1,
                                "date" => 1,
                                "type_of_space" => 1,
                                "type_of_space_item_id" => 'site',
                                "send_date" => 1
                            ]
                        ]
                    ],
                ],
            ],
            'error' => ['error' => true, 'code' => 14]
        ]
    ],
    'transactions' => [
        'method' => 'GET',
        'parameters' => [
            'page' => null,
            'date_from' => null,
            'date_to' => null,
            'update_from' => null,
            'update_to' => null
        ],
        'response' => [
            'success' => [
                "error" => false,
                "code" => 0,
                "count" => 3,
                "page" => 1,
                "pages" => 1,
                "data" => [
                    [
                        "id" => 1,
                        "user_id" => 2,
                        "order_id" => 1,
                        "replenishment_id" => null,
                        "amount" => "1000.00",
                        "type" => "spend",
                        "status" => 1,
                        "operation" => 2,
                        "comment" => "Покупка сертификата",
                        "showcase_company_id" => 14,
                        "date" => "2021-01-13 15=>02=>07",
                        "updated_at" => "2021-01-13 15=>02=>07",
                        "type_of_space_item_id" => 'site',
                        "send_date" => 1
                    ],
                    [
                        "id" => 4,
                        "user_id" => 2,
                        "order_id" => null,
                        "replenishment_id" => 123,
                        "amount" => "1000.00",
                        "type" => "mobile_replenishment",
                        "status" => 1,
                        "operation" => 2,
                        "comment" => "Покупка сертификата",
                        "showcase_company_id" => null,
                        "date" => "2021-01-13 15:02:07",
                        "updated_at" => "2021-01-13 15:02:07",
                        "type_of_space_item_id" => 'site',
                        "send_date" => 1
                    ]
                ]
            ],
            'error' => ['error' => true, 'code' => 14]
        ],
    ],
    'pull' => [
        'method' => 'GET',
        'parameters' => [
            'id' => null,
            'validity_from' => null,
            'validity_to' => null,
            'activation_from' => null,
            'activation_to' => null,
            'disable_from' => null,
            'disable_to' => null,
            'type_id' => null,
            'page' => null,
            'date_from' => null,
            'date_to' => null,
            'update_from' => null,
            'update_to' => null
        ],
        'response' => [
            'success' => [
                [
                    "error" => false,
                    "code" => 0,
                    "count" => 3,
                    "page" => 1,
                    "pages" => 1,
                    "data" => [
                        [
                            "id" => 1,
                            "number" => "xwqsd232",
                            "ext_number" => null,
                            "code" => "122121",
                            "supplier_id" => 4,
                            "nominal" => null,
                            "validity_date" => "2020-02-12 00:00:00",
                            "activation_date" => null,
                            "design" => null,
                            "item_id" => 1,
                            "status" => 1,
                            "user_id" => 1,
                            "user_balance_id" => 1
                        ],
                        [
                            "id" => 10,
                            "number" => "de2c2e33d3",
                            "code" => "cwecwecw3",
                            "supplier_id" => 4,
                            "nominal" => "1200",
                            "validity_date" => "2020-03-13 00:00:00",
                            "activation_date" => "2019-10-29 15:05:53",
                            "disable_date" => "2019-10-29 15:10:02",
                            "design" => null,
                            "type_id" => "7",
                            "item_id" => "1",
                            "status" => "3",
                            "user_id" => "1",
                            "user_balance_id" => "6"
                        ]
                    ]
                ],
            ],
            'error' => ['error' => true, 'code' => 11]
        ]
    ],
    'users' => [
        'method' => 'GET',
        'parameters' => [
            'page' => null,
            'update_from' => null,
            'update_to' => null
        ],
        'response' => [
            'success' =>
                [
                    "error" => false,
                    "code" => 0,
                    "count" => 3,
                    "page" => 1,
                    "pages" => 1,
                    "data" => [
                        [
                            "id" => 1,
                            "name" => "admin",
                            "surname" => "adminovich",
                            "lastname" => null,
                            "sex" => "Мужской",
                            "phone" => "8029-222-33-11",
                            "email" => "admin@admin.com",
                            "role_id" => 1,
                            "address_id" => null
                        ],
                        [
                            "id" => 2,
                            "name" => "client",
                            "surname" => "1",
                            "lastname" => "1",
                            "sex" => null,
                            "phone" => "1221212121",
                            "email" => "1@mail.ru",
                            "role_id" => 3,
                            "address_id" => null
                        ]
                    ]
                ],
            'error' => ['error' => true, 'code' => 11]
        ]
    ],
    'roles' => [
        'method' => 'GET',
        'parameters' => [],
        'response' => [
            'success' => [
                'error' => false,
                'code' => 0,
                'data' => [
                    [
                        'id' => 1,
                        'name' => 'admin'
                    ],
                    [
                        'id' => 2,
                        'name' => 'registered'
                    ],
                    [
                        'id' => 3,
                        'name' => 'api'
                    ],
                ]
            ],
            'error' => ['error' => true, 'code' => 11]
        ]
    ],
    'suppliers' => [
        [
            'method' => 'POST',
            'parameters' => [
                'code' => 'vpdrk',
                'code_1c' => 'vpdrk',
                'name' => 'vpdrk',
                'inn' => 'vpdrk'
            ],
            'response' => [
                'success' => ['error' => false, 'code' => 0],
                'error' => ['error' => true, 'code' => 11]
            ]
        ],
        [
            'method' => 'GET',
            'parameters' => [],
            'response' => [
                'success' => [
                    'error',
                    'code',
                    'data' => [
                        [
                            "id" => 1,
                            "name" => "Вподарок",
                            "code" => "vpodarok",
                            "code_1c" => "vpodarok",
                            "inn" => "vpodarok"
                        ],
                        [
                            "id" => 2,
                            "name" => "Магазин сертификатов",
                            "code" => "mc",
                            "code_1c" => "vpodarok",
                            "inn" => "vpodarok"
                        ]
                    ]
                ],
                'error' => ['error' => true, 'code' => 11]
            ]
        ]
    ],
    'balance' => [
        'method' => 'GET',
        'parameters' => [],
        'response' => [
            'success' => ['error' => false, 'code' => 0, 'value' => 100],
            'error' => ['error' => true, 'code' => 11]
        ]
    ],
    'type' => [
        'method' => 'GET',
        'parameters' => [],
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
        'parameters' => ['page' => null, 'date_from' => null, 'date_to' => null, 'update_from' => null, 'update_to' => null],
        'response' => [
            "success" => [
                "error" => false,
                "code" => 0,
                "count" => 3,
                "page" => 1,
                "pages" => 1,
                "data" => [
                    [
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
                    ],
                    [
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
                    ]
                ]
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
        'response' => [
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
        ]

    ],
    'ndfl' => [
        'method' => 'GET',
        'parameters' => [],
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
        ],
    ],
    'findJuridicalPerson' => [
        'method' => 'GET',
        'parameters' => ['contractor_id' => null],
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
        'parameters' => ['contractor_id' => null, 'name' => null, 'inn' => null],
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
        'parameters' => ['contractor_id' => null, 'number_order_1c' => null, 'created_at_1c' => null],
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
                    "updated_at" => "2022-01-13 10:36:59",
                    "created_at" => "2022-01-13 10:36:59",
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
            'parameters' => ['payment_id' => null],
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
            'parameters' => ['number' => null, 'amount' => null, 'payment_type' => null],
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
];
