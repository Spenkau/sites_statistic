<?php

return [
    'Addresses' => [
        [
            'uri' => 'address',
            'method' => 'GET',
            'query_params' => [
                'page' => 1,
                'limit' => 5
            ],
            'response' => [
                'success' => [
                    'success' => true,
                    'data' => [
                        [
                            'id' => 1,
                            'title' => 'Москва'
                        ]
                    ]
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'address',
            'method' => 'POST',
            'form_params' => [
                'title' => 'Гродно123',
            ],
            'response' => [
                'success' => [
                    "success" => true,
                    "data" => [
                        "id" => 1,
                        "title" => "Москва"
                    ]
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'address/{id}',
            'method' => 'GET',
            'path_params' => [
                'id' => 3
            ],
            'response' => [
                'success' => [
                    'success' => true,
                    'data' => [
                        [
                            'id' => 1,
                            'title' => 'Москва'
                        ]
                    ]
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'address/{id}',
            'method' => 'PUT',
            'path_params' => [
                'id' => 1
            ],
            'form_params' => [
                'title' => 'MOSCOW123'
            ],
            'response' => [
                'success' => [
                    'success' => true,
                    'data' => 1
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'address/{id}',
            'method' => 'DELETE',
            'path_params' => [
                'id' => 1
            ],
            'response' => [
                'success' => [
                    'success' => true,
                    'data' => true
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
    ],
    'Transactions' => [
        [
            'uri' => 'showcase/balance/general/{id}',
            'method' => 'GET',
            'path_params' => [
                'id' => 1,
            ],
            'response' => [
                'success' => [
                    "success" => true,
                    "data" => [
                        [
                            "id" => 1,
                            "user_id" => 1,
                            "client_id" => 1,
                            "amount" => 1,
                            "operation" => 1,
                            "status" => 1,
                            "comment" => "1",
                            "space_item_id" => 1
                        ]
                    ]
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'balances/general',
            'method' => 'GET',
            'query_params' => [
                'page' => 1,
                'limit' => 5
            ],
            'response' => [
                'success' => [
                    "success" => true,
                    "data" => [
                        [
                            "id" => 1,
                            "user_id" => 1,
                            "client_id" => 1,
                            "amount" => 1,
                            "operation" => 1,
                            "status" => 1,
                            "comment" => "1",
                            "space_item_id" => 1
                        ]
                    ]
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'transaction',
            'method' => 'GET',
            'query_params' => [
                'page' => 1,
                'limit' => 5
            ],
            'response' => [
                'success' => [
                    "success" => true,
                    "data" => [

                        "id" => 1,
                        "user_id" => 1,
                        "client_id" => 1,
                        "amount" => 1,
                        "operation" => 1,
                        "status" => 1,
                        "comment" => "1",
                        "space_item_id" => 1

                    ]
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ],
        ],
        [
            'uri' => 'transaction',
            'method' => 'POST',
            'form_params' => [
                'user_id' => 1,
                'client_id' => 5,
                'amount' => 5,
                'operation' => 5,
                'status' => 5,
                'comment' => 5,
                'space_item_id' => 5,
            ],
            'response' => [
                'success' => [
                    "success" => true,
                    "data" => [
                        "id" => 1,
                        "user_id" => 1,
                        "client_id" => 1,
                        "amount" => 1,
                        "operation" => 1,
                        "status" => 1,
                        "comment" => "1",
                        "space_item_id" => 1
                    ]
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'transaction/{id}',
            'method' => 'GET',
            'path_params' => [
                'id' => 1
            ],
            'response' => [
                'success' => [
                    "success" => true,
                    "data" => [
                        "id" => 1,
                        "user_id" => 1,
                        "client_id" => 1,
                        "amount" => 1,
                        "operation" => 1,
                        "status" => 1,
                        "comment" => "1",
                        "space_item_id" => 1
                    ]
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'transaction/{id}',
            'method' => 'GET',
            'path_params' => [
                'id' => 1
            ],
            'form_params' => [
                "user_id" => 1,
                "client_id" => 1,
                "amount" => 1,
                "operation" => 1,
                "status" => 1,
                "comment" => "1",
                "space_item_id" => 1
            ],
            'response' => [
                'success' => [
                    "success" => true,
                    "data" => 1
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'transaction/{id}',
            'method' => 'DELETE',
            'path_params' => [
                'id' => 1
            ],
            'response' => [
                'success' => [
                    "success" => true,
                    "data" => true
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'transaction/paykeeper/link',
            'method' => 'GET',
            'response' => [
                'success' => [
                    "success" => true,
                    "data" => "https=>//vpodarok-1.server.paykeeper.ru/create/"
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
    ],
    'Cities' => [
        [
            'uri' => 'city',
            'method' => 'GET',
            'query_params' => [
                'page' => 1,
                'limit' => 5
            ],
            'response' => [
                'success' => [
                    'success' => true,
                    'data' => [
                        [
                            'id' => 1,
                            'country_id' => 1,
                            'title' => 'Москва'
                        ]
                    ]
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'city',
            'method' => 'POST',
            'form_params' => [
                'country_id' => 1,
                'title' => 'Hrodna'
            ],
            'response' => [
                'success' => [
                    'success' => true,
                    'data' => [
                        'id' => 1,
                        'country_id' => 1,
                        'title' => 'Hrodna'
                    ]
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'city/{id}',
            'method' => 'GET',
            'path_params' => [
                'id' => 1,
            ],
            'response' => [
                'success' => [
                    'success' => true,
                    'data' => [
                        'id' => 1,
                        'country_id' => 1,
                        'title' => 'Hrodna'
                    ]
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'city/{id}',
            'method' => 'PUT',
            'form_params' => [
                'id' => 1,
                'country_id' => 1,
                'city' => 'Hrodna2'
            ],
            'response' => [
                'success' => [
                    'success' => true,
                    'data' => true
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'city/{id}',
            'method' => 'DELETE',
            'path_params' => [
                'id' => 1,
            ],
            'response' => [
                'success' => [
                    'success' => true,
                    'data' => true
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
    ],
    'Clients' => [
        [
            'uri' => 'client/phone/{phone}',
            'method' => 'GET',
            'path_params' => [
                'phone' => 375291919876,
                'limit' => 5
            ],
            'response' => [
                'success' => [
                    "success" => true,
                    "data" => [
                        "id" => 1,
                        "name" => "Иван",
                        "last_name" => "Иванов",
                        "surname" => "Иванович",
                        "email" => "example@vpodarok.ru",
                        "phone" => "79991112223",
                        "sex" => 1,
                        "type" => 1,
                        "address_id" => 1,
                        "birthday" => "2022-11-11",
                        "identification_ndfl" => 1,
                        "ip_address" => "127.0.0.1",
                        "is_possible_fraud" => true,
                        "image" => "https=>//vpodarok.ru/image",
                        "balances" => [
                            [
                                "space_item_id" => 1,
                                "balance" => 1,
                                "space_name" => "site",
                                "space_slug" => "site",
                                "space_image" => "https://vpodarok.ru/image",
                                "status" => true
                            ]
                        ],
                        "created_at" => "2022-11-11 18:18:20",
                        "updated_at" => "2022-11-11 18:18:20",
                        "email_verified_at" => "2022-11-11 18:18:20",
                        "email_verified" => true
                    ]
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'client',
            'method' => 'GET',
            'query_params' => [
                'page' => 1,
                'limit' => 1,
            ],
            'response' => [
                'success' => [
                    "success" => true,
                    "data" => [
                        [
                            "id" => 1,
                            "name" => "Иван",
                            "last_name" => "Иванов",
                            "surname" => "Иванович",
                            "email" => "example@vpodarok.ru",
                            "phone" => "79991112223",
                            "sex" => 1,
                            "type" => 1,
                            "address_id" => 1,
                            "birthday" => "2022-11-11",
                            "identification_ndfl" => 1,
                            "ip_address" => "127.0.0.1",
                            "is_possible_fraud" => true,
                            "image" => "https://vpodarok.ru/image",
                            "balances" => [
                                [
                                    "space_item_id" => 1,
                                    "balance" => 1,
                                    "space_name" => "site",
                                    "space_slug" => "site",
                                    "space_image" => "https://vpodarok.ru/image",
                                    "status" => true
                                ]
                            ],
                            "created_at" => "2022-11-11 18:18:20",
                            "updated_at" => "2022-11-11 18:18:20",
                            "email_verified_at" => "2022-11-11 18:18:20",
                            "email_verified" => true
                        ]
                    ]
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'client',
            'method' => 'POST',
            'form_params' => [
                'name' => 'alexey',
                'surname' => 'andreev',
                'lastname' => 'romanovich',
                'email' => 'andreev123@gmail.com',
                'phone' => '375291919876',
                'sex' => 1,
                'type' => 1,
                'address_id' => 1,
                'birthday' => '2000-06-25',
                'identification_ndfl' => 0,
                'ip_address' => '192.168.123.132',
                'is_possible_fraud' => 0
            ],
            'response' => [
                'success' => [
                    'name' => 'alexey',
                    'surname' => 'andreev',
                    'lastname' => 'romanovich',
                    'email' => 'andreev123@gmail.com',
                    'phone' => '375291919876',
                    'sex' => 1,
                    'type' => 1,
                    'address_id' => 1,
                    'birthday' => '2000-06-25',
                    'identification_ndfl' => 0,
                    'ip_address' => '192.168.123.132',
                    'is_possible_fraud' => 0
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'client/{id}',
            'method' => 'GET',
            'path_params' => [
                'id' => 1
            ],
            'response' => [
                'success' => [
                    "success" => true,
                    "data" => [
                        "id" => 1,
                        "name" => "Иван",
                        "last_name" => "Иванов",
                        "surname" => "Иванович",
                        "email" => "example@vpodarok.ru",
                        "phone" => "79991112223",
                        "sex" => 1,
                        "type" => 1,
                        "address_id" => 1,
                        "birthday" => "2022-11-11",
                        "identification_ndfl" => 1,
                        "ip_address" => "127.0.0.1",
                        "is_possible_fraud" => true,
                        "image" => "https://vpodarok.ru/image",
                        "balances" => [
                            [
                                "space_item_id" => 1,
                                "balance" => 1,
                                "space_name" => "site",
                                "space_slug" => "site",
                                "space_image" => "https://vpodarok.ru/image",
                                "status" => true
                            ]
                        ],
                        "created_at" => "2022-11-11 18:18:20",
                        "updated_at" => "2022-11-11 18:18:20",
                        "email_verified_at" => "2022-11-11 18:18:20",
                        "email_verified" => true
                    ]
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'client/{id}',
            'method' => 'PUT',
            'path_params' => [
                'id' => 1
            ],
            'form_params' => [
                'name' => 'alexey',
                'surname' => 'andreev',
                'lastname' => 'romanovich',
                'email' => 'andreev123@gmail.com',
                'phone' => '375291919876',
                'sex' => 1,
                'type' => 1,
                'address_id' => 1,
                'birthday' => '2000-06-25',
                'identification_ndfl' => 0,
                'ip_address' => '192.168.123.132',
                'is_possible_fraud' => 0
            ],
            'response' => [
                'success' => [
                    'name' => 'alexey',
                    'surname' => 'andreev',
                    'lastname' => 'romanovich',
                    'email' => 'andreev123@gmail.com',
                    'phone' => '375291919876',
                    'sex' => 1,
                    'type' => 1,
                    'address_id' => 1,
                    'birthday' => '2000-06-25',
                    'identification_ndfl' => 0,
                    'ip_address' => '192.168.123.132',
                    'is_possible_fraud' => 0
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'client/{id}',
            'method' => 'DELETE',
            'path_params' => [
                'id' => 1
            ],
            'response' => [
                'success' => [
                    'success' => true,
                    'data' => true
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'client/space/items',
            'method' => 'POST',
            'form_params' => [
                'space' => 'showcase',
                'slug' => 1,
                'role_id' => 1
            ],
            'response' => [
                'success' => [
                    'success' => true,
                    'data' => null
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'client/space/item/active',
            'method' => 'POST',
            'form_params' => [
                'space' => 'showcase',
                'slug' => 1,
            ],
            'response' => [
                'success' => [
                    'success' => true,
                    'data' => null
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
    ],
    'DataConnector' => [
        [
            'uri' => 'client/space/item',
            'method' => 'POST',
            'form_params' => [
                'space' => 'showcase',
                'slug' => '1',
                'role_id' => 1
            ],
            'response' => [
                'success' => [
                    'success' => true,
                    'data' => null
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'client/space/item/active',
            'method' => 'POST',
            'form_params' => [
                'space' => 'showcase',
                'slug' => '1',
            ],
            'response' => [
                'success' => [
                    'success' => true,
                    'data' => null
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ]
    ],
    'Countries' => [
        [
            'uri' => 'country',
            'method' => 'GET',
            'query_params' => [
                'page' => 1,
                'limit' => 5
            ],
            'response' => [
                'success' => [
                    'success' => true,
                    'data' => [
                        [
                            'id' => 1,
                            'title' => 'Нигермания'
                        ]
                    ]
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'country',
            'method' => 'POST',
            'form_params' => [
                'title' => 'Нигермания',
            ],
            'response' => [
                'success' => [
                    'success' => true,
                    'data' => [
                        [
                            'id' => 1,
                            'title' => 'Нигермания'
                        ]
                    ]
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'country',
            'method' => 'PUT',
            'path_params' => [
                'id' => 1,
            ],
            'response' => [
                'success' => [
                    'success' => true,
                    'data' => true,
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'country',
            'method' => 'DELETE',
            'form_params' => [
                'id' => 1,
                'title' => 'Нигермания',
            ],
            'response' => [
                'success' => [
                    'success' => true,
                    'data' => [
                        [
                            'id' => 1,
                            'title' => 'Нигермания'
                        ]
                    ]
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
    ],
    'Currencies' => [
        [
            'uri' => 'currency',
            'method' => 'GET',
            'query_params' => [
                'page' => 1,
                'limit' => 5
            ],
            'response' => [
                'success' => [
                    'success' => true,
                    'data' => [
                        [
                            [
                                "id" => 1,
                                "title" => "Рубли",
                                "iso_code" => 643,
                                "value" => "1000"
                            ]
                        ]
                    ]
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'currency',
            'method' => 'POST',
            'form_params' => [
                "id" => 1,
                "title" => "Рубли",
                "iso_code" => 643,
                "value" => "1000"
            ],
            'response' => [
                'success' => [
                    'success' => true,
                    'data' => [
                        [
                            [
                                "id" => 1,
                                "title" => "Рубли",
                                "iso_code" => 643,
                                "value" => "1000"
                            ]
                        ]
                    ]
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'currency/{id}',
            'method' => 'GET',
            'path_params' => [
                "id" => 1,
            ],
            'response' => [
                'success' => [
                    'success' => true,
                    'data' => [
                        [
                            [
                                "id" => 1,
                                "title" => "Рубли",
                                "iso_code" => 643,
                                "value" => "1000"
                            ]
                        ]
                    ]
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'currency/{id}',
            'method' => 'PUT',
            'path_params' => [
                "id" => 1
            ],
            'form_params' => [
                "id" => 1,
                "title" => "Доллары",
                "iso_code" => 555,
                "value" => "2222"
            ],
            'response' => [
                'success' => [
                    'success' => true,
                    'data' => 1
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'currency/{id}',
            'method' => 'DELETE',
            'path_params' => [
                "id" => 1,
            ],
            'response' => [
                'success' => [
                    'success' => true,
                    'data' => [
                        [
                            [
                                "id" => 1,
                                "title" => "Рубли",
                                "iso_code" => 643,
                                "value" => "1000"
                            ]
                        ]
                    ]
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
    ],
    'Mobile Funds' => [
        [
            'uri' => 'mobile/fund',
            'method' => 'GET',
            'query_params' => [
                'page' => 1,
                'limit' => 5
            ],
            'response' => [
                'success' => [
                    'success' => true,
                    'data' => [
                        [
                            [
                                "id" => 1,
                                "title" => "Сбор средств на охладитель Димасику",
                                "timestamp" => "2024-01-01 00:00:00",
                                "status" => 1,
                                "recommended_sum" => 100,
                                "sum" => 500,
                                "price" => 1000,
                                "image" => "path/to/img"
                            ]
                        ]
                    ]
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'mobile/fund',
            'method' => 'POST',
            'form_params' => [
                "title" => "Сбор средств на охладитель Димасику",
                "timestamp" => "2024-01-01 00:00:00",
                "product_id" => 1,
                "price" => 1000,
                "recommended_sum" => 100,
                "order_id" => 1
            ],
            'response' => [
                'success' => [
                    "success" => true,
                    "data" => [
                        "id" => 1,
                        "title" => "Сбор средств на подарок",
                        "text" => "Тут поздравление...",
                        "timestamp" => "2024-01-01 00:00:00",
                        "status" => 1,
                        "recommended_sum" => 100,
                        "sum" => 500,
                        "price" => 1000,
                        "count" => 1,
                        "product" => "#/components/schemas/ProductResource",
                        "organiser" => [
                            "id" => 1,
                            "name" => "Иван",
                            "last_name" => "Иванов",
                            "surname" => "Иванович",
                            "email" => "example@vpodarok.ru",
                            "phone" => "79991112223",
                            "sex" => 1,
                            "type" => 1,
                            "address_id" => 1,
                            "birthday" => "2022-11-11",
                            "identification_ndfl" => 1,
                            "ip_address" => "127.0.0.1",
                            "is_possible_fraud" => true,
                            "image" => "https://vpodarok.ru/image",
                            "balances" => [
                                [
                                    "space_item_id" => 1,
                                    "balance" => 1,
                                    "space_name" => "site",
                                    "space_slug" => "site",
                                    "space_image" => "https://vpodarok.ru/image",
                                    "status" => true
                                ]
                            ],
                            "created_at" => "2022-11-11 18:18:20",
                            "updated_at" => "2022-11-11 18:18:20",
                            "email_verified_at" => "2022-11-11 18:18:20",
                            "email_verified" => true
                        ],
                        "donation" => 100,
                        "order" => [
                            "id" => 1,
                            "to" => "example@vpodarok.ru",
                            "transaction_id" => 1,
                            "recipient_id" => 1,
                            "status" => 1,
                            "comment" => "Поздравляю",
                            "external_id" => 2,
                            "priority" => 12,
                            "link" => "",
                            "created_at" => "2021-05-20 12:00:00",
                            "updated_at" => "2021-05-20 12:00:00"
                        ],
                        "image" => "path/to/image",
                        "deeplink" => "hehehe"
                    ]
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'mobile/fund/{id}',
            'method' => 'GET',
            'path_params' => [
                'id' => 1,
            ],
            'response' => [
                'success' => [
                    'success' => true,
                    'data' => [
                        "id" => 1,
                        "title" => "Сбор средств на подарок",
                        "text" => "Тут поздравление...",
                        "timestamp" => "2024-01-01 00:00:00",
                        "status" => 1,
                        "recommended_sum" => 100,
                        "sum" => 500,
                        "price" => 1000,
                        "count" => 1,
                        "product" => "#/components/schemas/ProductResource",
                        "organiser" => [
                            "id" => 1,
                            "name" => "Иван",
                            "last_name" => "Иванов",
                            "surname" => "Иванович",
                            "email" => "example@vpodarok.ru",
                            "phone" => "79991112223",
                            "sex" => 1,
                            "type" => 1,
                            "address_id" => 1,
                            "birthday" => "2022-11-11",
                            "identification_ndfl" => 1,
                            "ip_address" => "127.0.0.1",
                            "is_possible_fraud" => true,
                            "image" => "https://vpodarok.ru/image",
                            "balances" => [
                                [
                                    "space_item_id" => 1,
                                    "balance" => 1,
                                    "space_name" => "site",
                                    "space_slug" => "site",
                                    "space_image" => "https://vpodarok.ru/image",
                                    "status" => true
                                ]
                            ],
                            "created_at" => "2022-11-11 18:18:20",
                            "updated_at" => "2022-11-11 18:18:20",
                            "email_verified_at" => "2022-11-11 18:18:20",
                            "email_verified" => true
                        ],
                        "donation" => 100,
                        "order" => [
                            "id" => 1,
                            "to" => "example@vpodarok.ru",
                            "transaction_id" => 1,
                            "recipient_id" => 1,
                            "status" => 1,
                            "comment" => "Поздравляю",
                            "external_id" => 2,
                            "priority" => 12,
                            "link" => "",
                            "created_at" => "2021-05-20 12:00:00",
                            "updated_at" => "2021-05-20 12:00:00"
                        ],
                        "image" => "path/to/image",
                        "deeplink" => "hehehe"
                    ]
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'mobile/fund/{id}',
            'method' => 'PUT',
            'path_params' => [
                'id' => 1
            ],
            'form_params' => [
                "title" => "Сбор средств на охладитель Димасику",
                "timestamp" => "2024-01-01 00:00:00",
                "product_id" => 1,
                "price" => 1000,
                "recommended_sum" => 100,
                "order_id" => 1
            ],
            'response' => [
                'success' => [
                    "success" => true,
                    "data" => [
                        "id" => 1,
                        "title" => "Сбор средств на подарок",
                        "text" => "Тут поздравление...",
                        "timestamp" => "2024-01-01 00:00:00",
                        "status" => 1,
                        "recommended_sum" => 100,
                        "sum" => 500,
                        "price" => 1000,
                        "count" => 1,
                        "product" => "#/components/schemas/ProductResource",
                        "organiser" => [
                            "id" => 1,
                            "name" => "Иван",
                            "last_name" => "Иванов",
                            "surname" => "Иванович",
                            "email" => "example@vpodarok.ru",
                            "phone" => "79991112223",
                            "sex" => 1,
                            "type" => 1,
                            "address_id" => 1,
                            "birthday" => "2022-11-11",
                            "identification_ndfl" => 1,
                            "ip_address" => "127.0.0.1",
                            "is_possible_fraud" => true,
                            "image" => "https://vpodarok.ru/image",
                            "balances" => [
                                [
                                    "space_item_id" => 1,
                                    "balance" => 1,
                                    "space_name" => "site",
                                    "space_slug" => "site",
                                    "space_image" => "https://vpodarok.ru/image",
                                    "status" => true
                                ]
                            ],
                            "created_at" => "2022-11-11 18:18:20",
                            "updated_at" => "2022-11-11 18:18:20",
                            "email_verified_at" => "2022-11-11 18:18:20",
                            "email_verified" => true
                        ],
                        "donation" => 100,
                        "order" => [
                            "id" => 1,
                            "to" => "example@vpodarok.ru",
                            "transaction_id" => 1,
                            "recipient_id" => 1,
                            "status" => 1,
                            "comment" => "Поздравляю",
                            "external_id" => 2,
                            "priority" => 12,
                            "link" => "",
                            "created_at" => "2021-05-20 12:00:00",
                            "updated_at" => "2021-05-20 12:00:00"
                        ],
                        "image" => "path/to/image",
                        "deeplink" => "hehehe"
                    ]
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'mobile/fund/{id}',
            'method' => 'PATCH',
            'path_params' => [
                'id' => 1
            ],
            'form_params' => [
                "title" => "Сбор средств на охладитель Димасику",
                "timestamp" => "2024-01-01 00:00:00",
                "product_id" => 1,
                "price" => 1000,
                "recommended_sum" => 100,
                "order_id" => 1
            ],
            'response' => [
                'success' => [
                    "success" => true,
                    "data" => [
                        "id" => 1,
                        "title" => "Сбор средств на подарок",
                        "text" => "Тут поздравление...",
                        "timestamp" => "2024-01-01 00:00:00",
                        "status" => 1,
                        "recommended_sum" => 100,
                        "sum" => 500,
                        "price" => 1000,
                        "count" => 1,
                        "product" => "#/components/schemas/ProductResource",
                        "organiser" => [
                            "id" => 1,
                            "name" => "Иван",
                            "last_name" => "Иванов",
                            "surname" => "Иванович",
                            "email" => "example@vpodarok.ru",
                            "phone" => "79991112223",
                            "sex" => 1,
                            "type" => 1,
                            "address_id" => 1,
                            "birthday" => "2022-11-11",
                            "identification_ndfl" => 1,
                            "ip_address" => "127.0.0.1",
                            "is_possible_fraud" => true,
                            "image" => "https://vpodarok.ru/image",
                            "balances" => [
                                [
                                    "space_item_id" => 1,
                                    "balance" => 1,
                                    "space_name" => "site",
                                    "space_slug" => "site",
                                    "space_image" => "https://vpodarok.ru/image",
                                    "status" => true
                                ]
                            ],
                            "created_at" => "2022-11-11 18:18:20",
                            "updated_at" => "2022-11-11 18:18:20",
                            "email_verified_at" => "2022-11-11 18:18:20",
                            "email_verified" => true
                        ],
                        "donation" => 100,
                        "order" => [
                            "id" => 1,
                            "to" => "example@vpodarok.ru",
                            "transaction_id" => 1,
                            "recipient_id" => 1,
                            "status" => 1,
                            "comment" => "Поздравляю",
                            "external_id" => 2,
                            "priority" => 12,
                            "link" => "",
                            "created_at" => "2021-05-20 12:00:00",
                            "updated_at" => "2021-05-20 12:00:00"
                        ],
                        "image" => "path/to/image",
                        "deeplink" => "hehehe"
                    ]
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'mobile/fund/{id}/join',
            'method' => 'POST',
            'path_params' => [
                'id' => 1
            ],
            'response' => [
                'success' => [
                    "success" => true,
                    "data" => null,
                    'error' => [
                        'success' => false,
                        'message' => 'Unauthorized'
                    ]
                ]
            ],
        ],
        [
            'uri' => 'mobile/fund/{id}/close',
            'method' => 'PATCH',
            'path_params' => [
                'id' => 1
            ],
            'response' => [
                'success' => [
                    "success" => true,
                    "data" => [
                        "id" => 1,
                        "title" => "Сбор средств на подарок",
                        "text" => "Тут поздравление...",
                        "timestamp" => "2024-01-01 00:00:00",
                        "status" => 1,
                        "recommended_sum" => 100,
                        "sum" => 500,
                        "price" => 1000,
                        "count" => 1,
                        "product" => "#/components/schemas/ProductResource",
                        "organiser" => [
                            "id" => 1,
                            "name" => "Иван",
                            "last_name" => "Иванов",
                            "surname" => "Иванович",
                            "email" => "example@vpodarok.ru",
                            "phone" => "79991112223",
                            "sex" => 1,
                            "type" => 1,
                            "address_id" => 1,
                            "birthday" => "2022-11-11",
                            "identification_ndfl" => 1,
                            "ip_address" => "127.0.0.1",
                            "is_possible_fraud" => true,
                            "image" => "https://vpodarok.ru/image",
                            "balances" => [
                                [
                                    "space_item_id" => 1,
                                    "balance" => 1,
                                    "space_name" => "site",
                                    "space_slug" => "site",
                                    "space_image" => "https://vpodarok.ru/image",
                                    "status" => true
                                ]
                            ],
                            "created_at" => "2022-11-11 18:18:20",
                            "updated_at" => "2022-11-11 18:18:20",
                            "email_verified_at" => "2022-11-11 18:18:20",
                            "email_verified" => true
                        ],
                        "donation" => 100,
                        "order" => [
                            "id" => 1,
                            "to" => "example@vpodarok.ru",
                            "transaction_id" => 1,
                            "recipient_id" => 1,
                            "status" => 1,
                            "comment" => "Поздравляю",
                            "external_id" => 2,
                            "priority" => 12,
                            "link" => "",
                            "created_at" => "2021-05-20 12:00:00",
                            "updated_at" => "2021-05-20 12:00:00"
                        ],
                        "image" => "path/to/image",
                        "deeplink" => "hehehe"
                    ],
                    'error' => [
                        'success' => false,
                        'message' => 'Unauthorized'
                    ]
                ]
            ]
        ],
        [
            'uri' => 'mobile/fund/{id}/donations',
            'method' => 'GET',
            'path_params' => [
                'id' => 1
            ],
            'response' => [
                'success' => [
                    "success" => true,
                    "data" => [
                        "id" => 1,
                        "title" => "Сбор средств на подарок",
                        "text" => "Тут поздравление...",
                        "timestamp" => "2024-01-01 00:00:00",
                        "status" => 1,
                        "recommended_sum" => 100,
                        "sum" => 500,
                        "price" => 1000,
                        "count" => 1,
                        "product" => "#/components/schemas/ProductResource",
                        "organiser" => [
                            "id" => 1,
                            "name" => "Иван",
                            "last_name" => "Иванов",
                            "surname" => "Иванович",
                            "email" => "example@vpodarok.ru",
                            "phone" => "79991112223",
                            "sex" => 1,
                            "type" => 1,
                            "address_id" => 1,
                            "birthday" => "2022-11-11",
                            "identification_ndfl" => 1,
                            "ip_address" => "127.0.0.1",
                            "is_possible_fraud" => true,
                            "image" => "https://vpodarok.ru/image",
                            "balances" => [
                                [
                                    "space_item_id" => 1,
                                    "balance" => 1,
                                    "space_name" => "site",
                                    "space_slug" => "site",
                                    "space_image" => "https://vpodarok.ru/image",
                                    "status" => true
                                ]
                            ],
                            "created_at" => "2022-11-11 18:18:20",
                            "updated_at" => "2022-11-11 18:18:20",
                            "email_verified_at" => "2022-11-11 18:18:20",
                            "email_verified" => true
                        ],
                        "donation" => 100,
                        "order" => [
                            "id" => 1,
                            "to" => "example@vpodarok.ru",
                            "transaction_id" => 1,
                            "recipient_id" => 1,
                            "status" => 1,
                            "comment" => "Поздравляю",
                            "external_id" => 2,
                            "priority" => 12,
                            "link" => "",
                            "created_at" => "2021-05-20 12:00:00",
                            "updated_at" => "2021-05-20 12:00:00"
                        ],
                        "image" => "path/to/image",
                        "deeplink" => "hehehe"
                    ],
                    'error' => [
                        'success' => false,
                        'message' => 'Unauthorized'
                    ]
                ]
            ]
        ],
        [
            'uri' => 'mobile/fund/{id}/prolong',
            'method' => 'PATCH',
            'path_params' => [
                'id' => 1
            ],
            'response' => [
                'success' => [
                    "success" => true,
                    "data" => [
                        "id" => 1,
                        "title" => "Сбор средств на подарок",
                        "text" => "Тут поздравление...",
                        "timestamp" => "2024-01-01 00:00:00",
                        "status" => 1,
                        "recommended_sum" => 100,
                        "sum" => 500,
                        "price" => 1000,
                        "count" => 1,
                        "product" => "#/components/schemas/ProductResource",
                        "organiser" => [
                            "id" => 1,
                            "name" => "Иван",
                            "last_name" => "Иванов",
                            "surname" => "Иванович",
                            "email" => "example@vpodarok.ru",
                            "phone" => "79991112223",
                            "sex" => 1,
                            "type" => 1,
                            "address_id" => 1,
                            "birthday" => "2022-11-11",
                            "identification_ndfl" => 1,
                            "ip_address" => "127.0.0.1",
                            "is_possible_fraud" => true,
                            "image" => "https://vpodarok.ru/image",
                            "balances" => [
                                [
                                    "space_item_id" => 1,
                                    "balance" => 1,
                                    "space_name" => "site",
                                    "space_slug" => "site",
                                    "space_image" => "https://vpodarok.ru/image",
                                    "status" => true
                                ]
                            ],
                            "created_at" => "2022-11-11 18:18:20",
                            "updated_at" => "2022-11-11 18:18:20",
                            "email_verified_at" => "2022-11-11 18:18:20",
                            "email_verified" => true
                        ],
                        "donation" => 100,
                        "order" => [
                            "id" => 1,
                            "to" => "example@vpodarok.ru",
                            "transaction_id" => 1,
                            "recipient_id" => 1,
                            "status" => 1,
                            "comment" => "Поздравляю",
                            "external_id" => 2,
                            "priority" => 12,
                            "link" => "",
                            "created_at" => "2021-05-20 12:00:00",
                            "updated_at" => "2021-05-20 12:00:00"
                        ],
                        "image" => "path/to/image",
                        "deeplink" => "hehehe"
                    ],
                    'error' => [
                        'success' => false,
                        'message' => 'Unauthorized'
                    ]
                ]
            ]
        ],
        [
            'uri' => 'mobile/fund/{id}/client/{client}/comment',
            'method' => 'PATCH',
            'path_params' => [
                'id' => 1,
                'client' => 1
            ],
            'response' => [
                'success' => [
                    "success" => true,
                    "data" => [
                        "id" => 1,
                        "title" => "Сбор средств на подарок",
                        "text" => "Тут поздравление...",
                        "timestamp" => "2024-01-01 00:00:00",
                        "status" => 1,
                        "recommended_sum" => 100,
                        "sum" => 500,
                        "price" => 1000,
                        "count" => 1,
                        "product" => "#/components/schemas/ProductResource",
                        "organiser" => [
                            "id" => 1,
                            "name" => "Иван",
                            "last_name" => "Иванов",
                            "surname" => "Иванович",
                            "email" => "example@vpodarok.ru",
                            "phone" => "79991112223",
                            "sex" => 1,
                            "type" => 1,
                            "address_id" => 1,
                            "birthday" => "2022-11-11",
                            "identification_ndfl" => 1,
                            "ip_address" => "127.0.0.1",
                            "is_possible_fraud" => true,
                            "image" => "https://vpodarok.ru/image",
                            "balances" => [
                                [
                                    "space_item_id" => 1,
                                    "balance" => 1,
                                    "space_name" => "site",
                                    "space_slug" => "site",
                                    "space_image" => "https://vpodarok.ru/image",
                                    "status" => true
                                ]
                            ],
                            "created_at" => "2022-11-11 18:18:20",
                            "updated_at" => "2022-11-11 18:18:20",
                            "email_verified_at" => "2022-11-11 18:18:20",
                            "email_verified" => true
                        ],
                        "donation" => 100,
                        "order" => [
                            "id" => 1,
                            "to" => "example@vpodarok.ru",
                            "transaction_id" => 1,
                            "recipient_id" => 1,
                            "status" => 1,
                            "comment" => "Поздравляю",
                            "external_id" => 2,
                            "priority" => 12,
                            "link" => "",
                            "created_at" => "2021-05-20 12:00:00",
                            "updated_at" => "2021-05-20 12:00:00"
                        ],
                        "image" => "path/to/image",
                        "deeplink" => "hehehe"
                    ],
                    'error' => [
                        'success' => false,
                        'message' => 'Unauthorized'
                    ]
                ]
            ]
        ],
        [
            'uri' => 'mobile/fund/{id}/donations/file',
            'method' => 'GET',
            'query_params' => [
                'id' => 1
            ],
            'response' => [
                'success' => [
                    'success' => true,
                    'data' => "https://storage.yandexcloud.net/dev.processing.ru/storage/app/public/fund/donations/b7454933d1e2525ea21a83f65519573e.xls"
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'mobile/fund/{id}/pay',
            'method' => 'POST',
            'query_params' => [
                'id' => 1
            ],
            'form_params' => [
                'comment' => 'comment',
                'type' => [
                    'bc' => 100,
                    'uk' => 100
                ]
            ],
            'response' => [
                'success' => [
                    'success' => true,
                    'data' => [
                        "link" => "http://paykeeper.link",
                        "body" => [
                            "sum" => 100,
                            "clientid" => 1,
                            "orderid" => 12,
                            "client_email" => "example@mail.ru",
                            "client_phone" => 70000000000
                        ],
                    ]
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
    ],
    'TestGeneration' => [
        [
            'uri' => 'generation/test',
            'method' => 'POST',
            'query_params' => [
                'id' => 1
            ],
            'response' => [
                'success' => [
                    'success' => true,
                    'data' => [
                        [
                            'link' => "https://....zip"
                        ]
                    ]
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ]
    ],
    'Mobile ClientNdflData' => [
        [
            'uri' => 'client/ndfl/act',
            'method' => 'GET',
            'query_params' => [
                'space' => 'showcase',
            ],
            'response' => [
                'success' => [
                    'success' => true,
                    'data' => [
                        [
                            'space' => 'showcase',
                        ]
                    ]
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'client/ndfl/act/upload',
            'method' => 'POST',
            'form_params' => [
                'space' => 'showcase',
            ],
            'response' => [
                'success' => [
                    'success' => true,
                    'data' => null
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'client/ndfl/data/active',
            'method' => 'POST',
            'form_params' => [
                'space' => 'showcase',
            ],
            'response' => [
                'success' => [
                    "success" => true,
                    "data" => [
                        "id" => 1,
                        "client_id" => 1,
                        "space_id" => 1,
                        "name" => "Дмитрий",
                        "surname" => "Рудачков",
                        "lastname" => "Валерьевич",
                        "email" => "email@mail.ru",
                        "phone" => 88005553535,
                        "birthday" => "2000-01-01",
                        "inn" => "1",
                        "snils" => "1",
                        "passport_series" => "KH",
                        "passport_number" => "11111",
                        "issued_by" => "11111",
                        "department_code" => 1,
                        "issued_date" => "2025-01-01",
                        "address" => "1",
                        "status" => "1",
                        "comment" => "1",
                        "files" => [
                            [
                                "id" => 1,
                                "type" => 1
                            ]
                        ]
                    ]
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'client/ndfl/data',
            'method' => 'POST',
            'form_params' => [
                "space" => "showcase",
                "name" => "Дмитрий",
                "surname" => "Рудачков",
                "lastname" => "Валерьевич",
                "email" => "email@mail.ru",
                "phone" => 88005553535,
                "birthday" => "2000-01-01",
                "inn" => "1",
                "snils" => "1",
                "passport_series" => "KH",
                "passport_number" => "11111",
                "issued_by" => "11111",
                "department_code" => 1,
                "address" => "1"
            ],
            'response' => [
                'success' => [
                    "success" => true,
                    "data" => [
                        "id" => 1,
                        "client_id" => 1,
                        "space_id" => 1,
                        "name" => "Дмитрий",
                        "surname" => "Рудачков",
                        "lastname" => "Валерьевич",
                        "email" => "email@mail.ru",
                        "phone" => 88005553535,
                        "birthday" => "2000-01-01",
                        "inn" => "1",
                        "snils" => "1",
                        "passport_series" => "KH",
                        "passport_number" => "11111",
                        "issued_by" => "11111",
                        "department_code" => 1,
                        "issued_date" => "2025-01-01",
                        "address" => "1",
                        "status" => "1",
                        "comment" => "1",
                        "files" => [
                            [
                                "id" => 1,
                                "type" => 1
                            ]
                        ]
                    ]
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'client/ndfl/data/{id}',
            'method' => 'PUT',
            'path_params' => [
                'id' => 1,
            ],
            'form_params' => [
                "space" => "showcase",
                "name" => "Дмитрий",
                "surname" => "Рудачков",
                "lastname" => "Валерьевич",
                "email" => "email@mail.ru",
                "phone" => 88005553535,
                "birthday" => "2000-01-01",
                "inn" => "1",
                "snils" => "1",
                "passport_series" => "KH",
                "passport_number" => "11111",
                "issued_by" => "11111",
                "department_code" => 1,
                "address" => "1"
            ],
            'response' => [
                'success' => [
                    "success" => true,
                    "data" => [
                        "id" => 1,
                        "client_id" => 1,
                        "space_id" => 1,
                        "name" => "Дмитрий",
                        "surname" => "Рудачков",
                        "lastname" => "Валерьевич",
                        "email" => "email@mail.ru",
                        "phone" => 88005553535,
                        "birthday" => "2000-01-01",
                        "inn" => "1",
                        "snils" => "1",
                        "passport_series" => "KH",
                        "passport_number" => "11111",
                        "issued_by" => "11111",
                        "department_code" => 1,
                        "issued_date" => "2025-01-01",
                        "address" => "1",
                        "status" => "1",
                        "comment" => "1",
                        "files" => [
                            [
                                "id" => 1,
                                "type" => 1
                            ]
                        ]
                    ]
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'client/ndfl/data/file/{id}',
            'method' => 'GET',
            'path_params' => [
                'id' => 1,
            ],
            'response' => [
                'success' => [
                    'success' => true,
                    'data' => "base64_encoded_file_content"
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'client/ndfl/data/file/{id}',
            'method' => 'DELETE',
            'path_params' => [
                'id' => 1,
            ],
            'response' => [
                'success' => [
                    'success' => true,
                    'data' => null
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'client/ndfl/data/file',
            'method' => 'DELETE',
            'form_params' => [
                'space' => 'showcase',
                'type' => 1
            ],
            'response' => [
                'success' => [
                    'success' => true,
                    'data' => null
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
    ],
    'Orders' => [
        [
            'uri' => 'order',
            'method' => 'GET',
            'query_params' => [
                'page' => 1,
                'limit' => 5
            ],
            'response' => [
                'success' => [
                    'success' => true,
                    'data' => [
                        "id" => 1,
                        "to" => "example@vpodarok.ru",
                        "transaction_id" => 1,
                        "recipient_id" => 1,
                        "status" => 1,
                        "comment" => "Поздравляю",
                        "external_id" => 2,
                        "priority" => 12,
                        "link" => "",
                        "created_at" => "2021-05-20 12:00:00",
                        "updated_at" => "2021-05-20 12:00:00"
                    ]
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'order',
            'method' => 'POST',
            'form_params' => [
                "transaction_id" => 1,
                "to" => "example@vpodarok.ru",
                "recipient_id" => 1,
                "status" => 1,
                "comment" => "Comment",
                "external_id" => 1,
                "priority" => 1
            ],
            'response' => [
                'success' => [
                    'success' => true,
                    'data' => [
                        "id" => 1,
                        "to" => "example@vpodarok.ru",
                        "transaction_id" => 1,
                        "recipient_id" => 1,
                        "status" => 1,
                        "comment" => "Поздравляю",
                        "external_id" => 2,
                        "priority" => 12,
                        "link" => "",
                        "created_at" => "2021-05-20 12:00:00",
                        "updated_at" => "2021-05-20 12:00:00"
                    ]
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'order',
            'method' => 'POST',
            'form_params' => [
                "transaction_id" => 1,
                "to" => "example@vpodarok.ru",
                "recipient_id" => 1,
                "status" => 1,
                "comment" => "Comment",
                "external_id" => 1,
                "priority" => 1
            ],
            'response' => [
                'success' => [
                    'success' => true,
                    'data' => [
                        "id" => 1,
                        "to" => "example@vpodarok.ru",
                        "transaction_id" => 1,
                        "recipient_id" => 1,
                        "status" => 1,
                        "comment" => "Поздравляю",
                        "external_id" => 2,
                        "priority" => 12,
                        "link" => "",
                        "created_at" => "2021-05-20 12:00:00",
                        "updated_at" => "2021-05-20 12:00:00"
                    ]
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'order/{id}',
            'method' => 'GET',
            'path_params' => [
                'id' => 1
            ],
            'response' => [
                'success' => [
                    'success' => true,
                    'data' => [
                        "id" => 1,
                        "to" => "example@vpodarok.ru",
                        "transaction_id" => 1,
                        "recipient_id" => 1,
                        "status" => 1,
                        "comment" => "Поздравляю",
                        "external_id" => 2,
                        "priority" => 12,
                        "link" => "",
                        "created_at" => "2021-05-20 12:00:00",
                        "updated_at" => "2021-05-20 12:00:00"
                    ]
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'order/{id}',
            'method' => 'PUT',
            'form_params' => [
                "transaction_id" => 1,
                "to" => "example@vpodarok.ru",
                "recipient_id" => 1,
                "status" => 1,
                "comment" => "Comment",
                "external_id" => 1,
                "priority" => 1
            ],
            'response' => [
                'success' => [
                    'success' => true,
                    'data' => 1
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'order/{id}',
            'method' => 'DELETE',
            'path_params' => [
                'id' => 1,
            ],
            'response' => [
                'success' => [
                    'success' => true,
                    'data' => true
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'order/buy',
            'method' => 'POST',
            'form_params' => [
                "client" => [
                    "phone" => "79999999999",
                    "name" => "Имя"
                ],
                "priority" => 1,
                "space_item_id" => 1,
                "type_sending" => 1,
                "fund_id" => 1,
                "comment" => "Комментарий",
                "submit" => true,
                "to" => "email@mail.ru",
                "to_name" => "Иван",
                "to_phone" => "+79991111111",
                "sended_at" => "2023-11-11 21:00:31",
                "type" => 1,
                "auto_generate" => true,
                "order_items" => [
                    [
                        "product_id" => 1,
                        "amount" => 100,
                        "quantity" => 1
                    ]
                ],
                "sender_user" => [
                    "name" => "Name",
                    "email" => "email@gmail.com",
                    "phone" => "+7777777777"
                ]
            ],
            'response' => [
                'success' => [
                    'success' => true,
                    'data' => [
                        'id' => 3123
                    ]
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'order/{id}/regenerate',
            'method' => 'POST',
            'path_params' => [
                'id' => 1,
            ],
            'response' => [
                'success' => [
                    'success' => true,
                    'data' => true
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ]

    ],
    'Mobile Order' => [
        [
            'uri' => 'mobile/order/buy',
            'method' => 'POST',
            'form_params' => [

                "priority" => 1,
                "space_item_id" => 1,
                "type_sending" => 1,
                "fund_id" => 1,
                "comment" => "Комментарий",
                "submit" => true,
                "to" => "email@mail.ru",
                "to_name" => "Иван",
                "to_phone" => "+79991111111",
                "sended_at" => "2023-11-11 21:00:31",
                "type" => 1,
                "auto_generate" => true,
                "order_items" => [
                    [
                        "product_id" => 1,
                        "amount" => 100,
                        "quantity" => 3
                    ]
                ]

            ],
            'response' => [
                'success' => [
                    'success' => true,
                    'data' => [
                        [
                            'id' => 3132,
                        ]
                    ]
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'mobile/order/{id}',
            'method' => 'GET',
            'path_params' => [
                'id' => 1,
            ],
            'response' => [
                'success' => [
                    "success" => true,
                    "data" => [
                        "id" => 1,
                        "to" => "79997777777",
                        "buyer" => [
                            "name" => "Иван",
                            "lastname" => "Иван",
                            "surname" => "Иван",
                            "phone" => "79997777777",
                            "email" => "dev@vpodarok.ru"
                        ],
                        "recipient" => [
                            "name" => "Иван",
                            "lastname" => "Иван",
                            "surname" => "Иван",
                            "phone" => "79997777777",
                            "email" => "dev@vpodarok.ru"
                        ],
                        "products" => [
                            [
                                "id" => 1,
                                "name" => "Универсальная карта Vpodarok",
                                "images" => [
                                    [
                                        "main" => "https://vpodarok.ru/images/certificate.png",
                                        "other" => [
                                            "string"
                                        ]
                                    ]
                                ],
                                "nominal" => 1000,
                                "markup" => [
                                    "type" => 1,
                                    "value" => 7
                                ]
                            ]
                        ],
                        "order_data" => [
                            [
                                "key" => "recipient.email",
                                "value" => "dev@vpodarok.ru"
                            ]
                        ],
                        "quantity" => 15,
                        "fund_id" => 1,
                        "total" => 15000,
                        "type" => "buy",
                        "sended_at" => "2021-05-20 12:00:00",
                        "status" => 1,
                        "payment_types" => [
                            [
                                "id" => 1,
                                "title" => "Банковская карта"
                            ]
                        ]
                    ]
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ]
    ],
    'OrderItems' => [
        [
            'uri' => 'order/item',
            'method' => 'GET',
            'query_params' => [
                'page' => 1,
                'limit' => 5
            ],
            'response' => [
                'success' => [
                    "success" => true,
                    "data" => [
                        [
                            "id" => 1,
                            "order_id" => 1,
                            "product_id" => 1,
                            "amount" => 1,
                            "total" => 1,
                            "markup_type" => 1,
                            "markup_value" => 1,
                            "status" => 1,
                            "supplier_id" => 1,
                            "pull_card_id" => 1,
                            "supplier_external_id" => 1,
                            "supplier_code" => "1",
                            "attempts" => 1
                        ]
                    ]
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'order/item',
            'method' => 'POST',
            'form_params' => [
                "id" => 1,
                "order_id" => 1,
                "product_id" => 1,
                "amount" => 1,
                "total" => 1,
                "markup_type" => 1,
                "markup_value" => 1,
                "status" => 1,
                "supplier_id" => 1,
                "pull_card_id" => 1,
                "supplier_external_id" => 1,
                "supplier_code" => "1",
                "attempts" => 1
            ],
            'response' => [
                'success' => [
                    "success" => true,
                    "data" => [
                        [
                            "id" => 1,
                            "order_id" => 1,
                            "product_id" => 1,
                            "amount" => 1,
                            "total" => 1,
                            "markup_type" => 1,
                            "markup_value" => 1,
                            "status" => 1,
                            "supplier_id" => 1,
                            "pull_card_id" => 1,
                            "supplier_external_id" => 1,
                            "supplier_code" => "1",
                            "attempts" => 1
                        ]
                    ]
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'order/item/{id}',
            'method' => 'GET',
            'path_params' => [
                'id' => 1
            ],
            'response' => [
                'success' => [
                    "success" => true,
                    "data" => [
                        "id" => 1,
                        "order_id" => 1,
                        "product_id" => 1,
                        "amount" => 1,
                        "total" => 1,
                        "markup_type" => 1,
                        "markup_value" => 1,
                        "status" => 1,
                        "supplier_id" => 1,
                        "pull_card_id" => 1,
                        "supplier_external_id" => 1,
                        "supplier_code" => "1",
                        "attempts" => 1
                    ]
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'order/item/{id}',
            'method' => 'PUT',
            'form_params' => [
                "id" => 1,
                "order_id" => 1,
                "product_id" => 1,
                "amount" => 1,
                "total" => 1,
                "markup_type" => 1,
                "markup_value" => 1,
                "status" => 1,
                "supplier_id" => 1,
                "pull_card_id" => 1,
                "supplier_external_id" => 1,
                "supplier_code" => "1",
                "attempts" => 1
            ],
            'response' => [
                'success' => [
                    "success" => true,
                    "data" => 1
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
        [
            'uri' => 'order/item/{id}',
            'method' => 'DELETE',
            'path_params' => [
                'id' => 1
            ],
            'response' => [
                'success' => [
                    "success" => true,
                    "data" => true
                ],
                'error' => [
                    'success' => false,
                    'message' => 'Unauthorized'
                ]
            ]
        ],
    ],
//    'OrderItemsDatas' => [
//        'uri' => 'address',
//        'method' => 'GET',
//        'query_params' => [
//            'page' => 1,
//            'limit' => 5
//        ],
//        'response' => [
//            'success' => [
//                'success' => true,
//                'data' => [
//                    [
//                        'id' => 1,
//                        'title' => 'Москва'
//                    ]
//                ]
//            ],
//            'error' => [
//                'success' => false,
//                'message' => 'Unauthorized'
//            ]
//        ]
//    ],
//    'Products' => [
//        'uri' => 'address',
//        'method' => 'GET',
//        'query_params' => [
//            'page' => 1,
//            'limit' => 5
//        ],
//        'response' => [
//            'success' => [
//                'success' => true,
//                'data' => [
//                    [
//                        'id' => 1,
//                        'title' => 'Москва'
//                    ]
//                ]
//            ],
//            'error' => [
//                'success' => false,
//                'message' => 'Unauthorized'
//            ]
//        ]
//    ],
//    'ProductsDatas' => [
//        'uri' => 'address',
//        'method' => 'GET',
//        'query_params' => [
//            'page' => 1,
//            'limit' => 5
//        ],
//        'response' => [
//            'success' => [
//                'success' => true,
//                'data' => [
//                    [
//                        'id' => 1,
//                        'title' => 'Москва'
//                    ]
//                ]
//            ],
//            'error' => [
//                'success' => false,
//                'message' => 'Unauthorized'
//            ]
//        ]
//    ],
//    'ProductsPrices' => [
//        'uri' => 'address',
//        'method' => 'GET',
//        'query_params' => [
//            'page' => 1,
//            'limit' => 5
//        ],
//        'response' => [
//            'success' => [
//                'success' => true,
//                'data' => [
//                    [
//                        'id' => 1,
//                        'title' => 'Москва'
//                    ]
//                ]
//            ],
//            'error' => [
//                'success' => false,
//                'message' => 'Unauthorized'
//            ]
//        ]
//    ],
//    'ProductsUserSettings' => [
//        'uri' => 'address',
//        'method' => 'GET',
//        'query_params' => [
//            'page' => 1,
//            'limit' => 5
//        ],
//        'response' => [
//            'success' => [
//                'success' => true,
//                'data' => [
//                    [
//                        'id' => 1,
//                        'title' => 'Москва'
//                    ]
//                ]
//            ],
//            'error' => [
//                'success' => false,
//                'message' => 'Unauthorized'
//            ]
//        ]
//    ],
//    'PullCards' => [
//        'uri' => 'address',
//        'method' => 'GET',
//        'query_params' => [
//            'page' => 1,
//            'limit' => 5
//        ],
//        'response' => [
//            'success' => [
//                'success' => true,
//                'data' => [
//                    [
//                        'id' => 1,
//                        'title' => 'Москва'
//                    ]
//                ]
//            ],
//            'error' => [
//                'success' => false,
//                'message' => 'Unauthorized'
//            ]
//        ]
//    ],
//    'PullGenerates' => [
//        'uri' => 'address',
//        'method' => 'GET',
//        'query_params' => [
//            'page' => 1,
//            'limit' => 5
//        ],
//        'response' => [
//            'success' => [
//                'success' => true,
//                'data' => [
//                    [
//                        'id' => 1,
//                        'title' => 'Москва'
//                    ]
//                ]
//            ],
//            'error' => [
//                'success' => false,
//                'message' => 'Unauthorized'
//            ]
//        ]
//    ],
//    'PullGenerateGroups' => [
//        'uri' => 'address',
//        'method' => 'GET',
//        'query_params' => [
//            'page' => 1,
//            'limit' => 5
//        ],
//        'response' => [
//            'success' => [
//                'success' => true,
//                'data' => [
//                    [
//                        'id' => 1,
//                        'title' => 'Москва'
//                    ]
//                ]
//            ],
//            'error' => [
//                'success' => false,
//                'message' => 'Unauthorized'
//            ]
//        ]
//    ],
//    'PullToTypeOfSpaces' => [
//        'uri' => 'address',
//        'method' => 'GET',
//        'query_params' => [
//            'page' => 1,
//            'limit' => 5
//        ],
//        'response' => [
//            'success' => [
//                'success' => true,
//                'data' => [
//                    [
//                        'id' => 1,
//                        'title' => 'Москва'
//                    ]
//                ]
//            ],
//            'error' => [
//                'success' => false,
//                'message' => 'Unauthorized'
//            ]
//        ]
//    ],
//    'Reports' => [
//        'uri' => 'address',
//        'method' => 'GET',
//        'query_params' => [
//            'page' => 1,
//            'limit' => 5
//        ],
//        'response' => [
//            'success' => [
//                'success' => true,
//                'data' => [
//                    [
//                        'id' => 1,
//                        'title' => 'Москва'
//                    ]
//                ]
//            ],
//            'error' => [
//                'success' => false,
//                'message' => 'Unauthorized'
//            ]
//        ]
//    ],
//    'Roles' => [
//        'uri' => 'address',
//        'method' => 'GET',
//        'query_params' => [
//            'page' => 1,
//            'limit' => 5
//        ],
//        'response' => [
//            'success' => [
//                'success' => true,
//                'data' => [
//                    [
//                        'id' => 1,
//                        'title' => 'Москва'
//                    ]
//                ]
//            ],
//            'error' => [
//                'success' => false,
//                'message' => 'Unauthorized'
//            ]
//        ]
//    ],
//    'ShortUrls' => [
//        'uri' => 'address',
//        'method' => 'GET',
//        'query_params' => [
//            'page' => 1,
//            'limit' => 5
//        ],
//        'response' => [
//            'success' => [
//                'success' => true,
//                'data' => [
//                    [
//                        'id' => 1,
//                        'title' => 'Москва'
//                    ]
//                ]
//            ],
//            'error' => [
//                'success' => false,
//                'message' => 'Unauthorized'
//            ]
//        ]
//    ],
//    'SmsSendings' => [
//        'uri' => 'address',
//        'method' => 'GET',
//        'query_params' => [
//            'page' => 1,
//            'limit' => 5
//        ],
//        'response' => [
//            'success' => [
//                'success' => true,
//                'data' => [
//                    [
//                        'id' => 1,
//                        'title' => 'Москва'
//                    ]
//                ]
//            ],
//            'error' => [
//                'success' => false,
//                'message' => 'Unauthorized'
//            ]
//        ]
//    ],
//    'SpaceItems' => [
//        'uri' => 'address',
//        'method' => 'GET',
//        'query_params' => [
//            'page' => 1,
//            'limit' => 5
//        ],
//        'response' => [
//            'success' => [
//                'success' => true,
//                'data' => [
//                    [
//                        'id' => 1,
//                        'title' => 'Москва'
//                    ]
//                ]
//            ],
//            'error' => [
//                'success' => false,
//                'message' => 'Unauthorized'
//            ]
//        ]
//    ],
//    'Suppliers' => [
//        'uri' => 'address',
//        'method' => 'GET',
//        'query_params' => [
//            'page' => 1,
//            'limit' => 5
//        ],
//        'response' => [
//            'success' => [
//                'success' => true,
//                'data' => [
//                    [
//                        'id' => 1,
//                        'title' => 'Москва'
//                    ]
//                ]
//            ],
//            'error' => [
//                'success' => false,
//                'message' => 'Unauthorized'
//            ]
//        ]
//    ],
//    'SupplierOffice' => [
//        'uri' => 'address',
//        'method' => 'GET',
//        'query_params' => [
//            'page' => 1,
//            'limit' => 5
//        ],
//        'response' => [
//            'success' => [
//                'success' => true,
//                'data' => [
//                    [
//                        'id' => 1,
//                        'title' => 'Москва'
//                    ]
//                ]
//            ],
//            'error' => [
//                'success' => false,
//                'message' => 'Unauthorized'
//            ]
//        ]
//    ],
//    'Users' => [
//        'uri' => 'address',
//        'method' => 'GET',
//        'query_params' => [
//            'page' => 1,
//            'limit' => 5
//        ],
//        'response' => [
//            'success' => [
//                'success' => true,
//                'data' => [
//                    [
//                        'id' => 1,
//                        'title' => 'Москва'
//                    ]
//                ]
//            ],
//            'error' => [
//                'success' => false,
//                'message' => 'Unauthorized'
//            ]
//        ]
//    ],
//    'UserIpAddresses' => [
//        'uri' => 'address',
//        'method' => 'GET',
//        'query_params' => [
//            'page' => 1,
//            'limit' => 5
//        ],
//        'response' => [
//            'success' => [
//                'success' => true,
//                'data' => [
//                    [
//                        'id' => 1,
//                        'title' => 'Москва'
//                    ]
//                ]
//            ],
//            'error' => [
//                'success' => false,
//                'message' => 'Unauthorized'
//            ]
//        ]
//    ],
//    'UserWebhooks' => [
//        'uri' => 'address',
//        'method' => 'GET',
//        'query_params' => [
//            'page' => 1,
//            'limit' => 5
//        ],
//        'response' => [
//            'success' => [
//                'success' => true,
//                'data' => [
//                    [
//                        'id' => 1,
//                        'title' => 'Москва'
//                    ]
//                ]
//            ],
//            'error' => [
//                'success' => false,
//                'message' => 'Unauthorized'
//            ]
//        ]
//    ],
//    'SupplierOffice users' => [
//        'uri' => 'address',
//        'method' => 'GET',
//        'query_params' => [
//            'page' => 1,
//            'limit' => 5
//        ],
//        'response' => [
//            'success' => [
//                'success' => true,
//                'data' => [
//                    [
//                        'id' => 1,
//                        'title' => 'Москва'
//                    ]
//                ]
//            ],
//            'error' => [
//                'success' => false,
//                'message' => 'Unauthorized'
//            ]
//        ]
//    ],
//    'Mobile Auth' => [
//        'uri' => 'address',
//        'method' => 'GET',
//        'query_params' => [
//            'page' => 1,
//            'limit' => 5
//        ],
//        'response' => [
//            'success' => [
//                'success' => true,
//                'data' => [
//                    [
//                        'id' => 1,
//                        'title' => 'Москва'
//                    ]
//                ]
//            ],
//            'error' => [
//                'success' => false,
//                'message' => 'Unauthorized'
//            ]
//        ]
//    ],
//    'Mobile SMS' => [
//        'uri' => 'address',
//        'method' => 'GET',
//        'query_params' => [
//            'page' => 1,
//            'limit' => 5
//        ],
//        'response' => [
//            'success' => [
//                'success' => true,
//                'data' => [
//                    [
//                        'id' => 1,
//                        'title' => 'Москва'
//                    ]
//                ]
//            ],
//            'error' => [
//                'success' => false,
//                'message' => 'Unauthorized'
//            ]
//        ]
//    ],
//    'Mobile Activate UK' => [
//        'uri' => 'address',
//        'method' => 'GET',
//        'query_params' => [
//            'page' => 1,
//            'limit' => 5
//        ],
//        'response' => [
//            'success' => [
//                'success' => true,
//                'data' => [
//                    [
//                        'id' => 1,
//                        'title' => 'Москва'
//                    ]
//                ]
//            ],
//            'error' => [
//                'success' => false,
//                'message' => 'Unauthorized'
//            ]
//        ]
//    ],
//    'Mobile Profile' => [
//        'uri' => 'address',
//        'method' => 'GET',
//        'query_params' => [
//            'page' => 1,
//            'limit' => 5
//        ],
//        'response' => [
//            'success' => [
//                'success' => true,
//                'data' => [
//                    [
//                        'id' => 1,
//                        'title' => 'Москва'
//                    ]
//                ]
//            ],
//            'error' => [
//                'success' => false,
//                'message' => 'Unauthorized'
//            ]
//        ]
//    ],
//    'Mobile Email' => [
//        'uri' => 'address',
//        'method' => 'GET',
//        'query_params' => [
//            'page' => 1,
//            'limit' => 5
//        ],
//        'response' => [
//            'success' => [
//                'success' => true,
//                'data' => [
//                    [
//                        'id' => 1,
//                        'title' => 'Москва'
//                    ]
//                ]
//            ],
//            'error' => [
//                'success' => false,
//                'message' => 'Unauthorized'
//            ]
//        ]
//    ],
//    'Mobile Payment' => [
//        'uri' => 'address',
//        'method' => 'GET',
//        'query_params' => [
//            'page' => 1,
//            'limit' => 5
//        ],
//        'response' => [
//            'success' => [
//                'success' => true,
//                'data' => [
//                    [
//                        'id' => 1,
//                        'title' => 'Москва'
//                    ]
//                ]
//            ],
//            'error' => [
//                'success' => false,
//                'message' => 'Unauthorized'
//            ]
//        ]
//    ],
//    'Mobile Products' => [
//        'uri' => 'address',
//        'method' => 'GET',
//        'query_params' => [
//            'page' => 1,
//            'limit' => 5
//        ],
//        'response' => [
//            'success' => [
//                'success' => true,
//                'data' => [
//                    [
//                        'id' => 1,
//                        'title' => 'Москва'
//                    ]
//                ]
//            ],
//            'error' => [
//                'success' => false,
//                'message' => 'Unauthorized'
//            ]
//        ]
//    ],
//    'Mobile Showcase' => [
//        'uri' => 'address',
//        'method' => 'GET',
//        'query_params' => [
//            'page' => 1,
//            'limit' => 5
//        ],
//        'response' => [
//            'success' => [
//                'success' => true,
//                'data' => [
//                    [
//                        'id' => 1,
//                        'title' => 'Москва'
//                    ]
//                ]
//            ],
//            'error' => [
//                'success' => false,
//                'message' => 'Unauthorized'
//            ]
//        ]
//    ],
//    'Mobile Transaction' => [
//        'uri' => 'address',
//        'method' => 'GET',
//        'query_params' => [
//            'page' => 1,
//            'limit' => 5
//        ],
//        'response' => [
//            'success' => [
//                'success' => true,
//                'data' => [
//                    [
//                        'id' => 1,
//                        'title' => 'Москва'
//                    ]
//                ]
//            ],
//            'error' => [
//                'success' => false,
//                'message' => 'Unauthorized'
//            ]
//        ]
//    ],
];
