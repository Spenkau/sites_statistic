<?php

namespace App\Enums;

enum ApiResponseCodesEnum
{
    case SUCCESS;
    case AUTHORIZATION_ERROR;
    case INVALID_TOKEN;
    case NOT_ENOUGH_ACCESS_RIGHTS;
    case NOT_ENOUGH_INPUT;

}
