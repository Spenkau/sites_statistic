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
                'title' => 'Гродно',
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
                'id' => 1,
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
                    "data" => "https://vpodarok-1.server.paykeeper.ru/create/"
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
            'response_data' => [
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
// TODO GET api/client/{id} СЛЕДУЮЩЕЕ
    ],
    'DataConnector' => [
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
    'Countries' => [
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
    'Currencies' => [
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
    'Mobile_Funds' => [
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
    'TestGeneration' => [
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
    'Mobile ClientNdflData' => [123 => 123],
    'Orders' => [
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
    'Mobile Order' => ['123'],
    'OrderItems' => [
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
    'OrderItemsDatas' => [
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
    'Products' => [
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
    'ProductsDatas' => [
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
    'ProductsPrices' => [
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
    'ProductsUserSettings' => [
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
    'PullCards' => [
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
    'PullGenerates' => [
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
    'PullGenerateGroups' => [
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
    'PullToTypeOfSpaces' => [
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
    'Reports' => [
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
    'Roles' => [
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
    'ShortUrls' => [
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
    'SmsSendings' => [
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
    'SpaceItems' => [
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
    'Suppliers' => [
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
    'SupplierOffice' => [
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
    'Users' => [
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
    'UserIpAddresses' => [
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
    'UserWebhooks' => [
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
    'SupplierOffice users' => [
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
    'Mobile Auth' => [
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
    'Mobile SMS' => [
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
    'Mobile Activate UK' => [
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
    'Mobile Profile' => [
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
    'Mobile Email' => [
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
    'Mobile Payment' => [
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
    'Mobile Products' => [
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
    'Mobile Showcase' => [
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
    'Mobile Transaction' => [
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
];
