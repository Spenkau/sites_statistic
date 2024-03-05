<?php

namespace App\Enums;

enum NotificationEnum
{
    case TELEGRAM;
    case WHATSAPP;
    case SMS;
    case EMAIL;
}
