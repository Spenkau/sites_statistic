<?php

namespace App\Enums;

enum ApiResponseCodesEnum
{
    const CODES = [
        0 => 'success',
        1 => 'Authorisation Error',
        3 => 'Invalid token',
        5 => 'Not enough access rights',
        8 => 'Not enough input',
        'There are not enough funds on the balance',
        'Invalid order number',
        'Invalid data type',
        'Invalid quantity',
        'Nominal does not exist',
        'System error',
        'Access by IP address is disabled',
        'Product does not exist',
        'Mobile replenishment error',
        'Undefined mobile replenishment type'
    ];
}
