<?php

namespace App\Enums;

enum ApiProcessingServiceEnum: string
{
    case ADDRESSES = "Addresses";
    case TRANSACTIONS = "Transactions";
    case CITIES = "Cities";
    case CLIENTS = "Clients";
    case DATA_CONNECTOR = "DataConnector";
    case COUNTRIES = "Countries";
    case CURRENCIES = "Currencies";
    case MOBILE_FUNDS = "Mobile Funds";
    case TEST_GENERATION = "TestGeneration";
    case MOBILE_CLIENT_NDFL_DATA = "Mobile ClientNdflData";
    case ORDERS = "Orders";
    case MOBILE_ORDER = "Mobile Order";
    case ORDER_ITEMS = "OrderItems";
//    case ORDER_ITEMS_DATAS = "OrderItemsDatas";
//    case PRODUCTS = "Products";
//    case PRODUCTS_DATAS = "ProductsDatas";
//    case PRODUCTS_PRICES = "ProductsPrices";
//    case PRODUCTS_USER_SETTINGS = "ProductsUserSettings";
//    case PULL_CARDS = "PullCards";
//    case PULL_GENERATES = "PullGenerates";
//    case PULL_GENERATE_GROUPS = "PullGenerateGroups";
//    case PULL_TO_TYPE_OF_SPACES = "PullToTypeOfSpaces";
//    case REPORTS = "Reports";
//    case ROLES = "Roles";
//    case SHORT_URLS = "ShortUrls";
//    case SMS_SENDINGS = "SmsSendings";
//    case SPACE_ITEMS = "SpaceItems";
//    case SUPPLIERS = "Suppliers";
//    case SUPPLIER_OFFICE = "SupplierOffice";
//    case USERS = "Users";
//    case USER_IP_ADDRESSES = "UserIpAddresses";
//    case USER_WEBHOOKS = "UserWebhooks";
//    case SUPPLIER_OFFICE_USERS = "SupplierOffice users";
//    case MOBILE_AUTH = "Mobile Auth";
//    case MOBILE_SMS = "Mobile SMS";
//    case MOBILE_ACTIVATE_UK = "Mobile Activate UK";
//    case MOBILE_PROFILE = "Mobile Profile";
//    case MOBILE_EMAIL = "Mobile Email";
//    case MOBILE_PAYMENT = "Mobile Payment";
//    case MOBILE_PRODUCTS = "Mobile Products";
//    case MOBILE_SHOWCASE = "Mobile Showcase";
//    case MOBILE_TRANSACTION = "Mobile Transaction";
}
