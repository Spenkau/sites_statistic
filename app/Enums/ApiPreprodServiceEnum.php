<?php

namespace App\Enums;

enum ApiPreprodServiceEnum: string
{
//    case LOGIN  = 'login';
    case PRODUCTS = 'products';
    case OPTIONS = 'options';
    case BUY = 'buy';
    case ORDER_STATUS = 'orderStatus';
    case ORDER = 'orders';
    case ORDERS_ALL = 'ordersAll';
    case TRANSACTIONS = 'transactions';
    case PULL = 'pull';
    case USERS = 'users';
    case ROLES = 'roles';
    case SUPPLIERS = 'suppliers';
    case BALANCE = 'balance';
    case TYPE = 'type';
    case MOBILE_REPLENISHMENTS = 'mobileReplenishments';
    case SHOWCASE_COMPANY = 'showcaseCompany';
    case NDFL = 'ndfl';
    case GET_ALL_JURIDICAL_ORDERS = 'getAllJuridicalOrders';
    case FIND_JURIDICAL_PERSON = 'findJuridicalPerson';
    case CREATE_JURIDICAL_PERSON = 'createJuridicalPerson';
    case CREATE_JURIDICAL_ORDER = 'createJuridicalOrder';
    case GET_MOBILE_PERLENISHMENT_PAYMENT_TYPES = 'getMobileReplenishmentPaymentTypes';
    case CREATE_MOBILE_PERLENISHMENT = 'createMobileReplenishment';
}
