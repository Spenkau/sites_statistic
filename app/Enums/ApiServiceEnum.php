<?php

namespace App\Enums;

enum ApiServiceEnum: string
{
//    case LOGIN  = 'login';
    case PRODUCTS = 'products';
    case OPTIONS = 'options';
    case BUY = 'buy';
    case ORDER_STATUS = 'orderStatus';
    case ORDER = 'orders';
    case ORDERS_ALL = 'ordersAll';
    case TRANSACTIONS = 'transactions';
//    case PULL = 'pull';
//    case USERS = 'users';
//    case ROLES = 'roles';
//    case SUPPLIERS = 'suppliers';
//    case BALANCE = 'balance';
//    case TYPE = 'type';
//    case MOBILE_REPLENISHMENTS = 'mobileReplenishments';
//    case SHOWCASE_COMPANY = 'showcaseCompany';
//    case NDFL = 'ndfl';
}
