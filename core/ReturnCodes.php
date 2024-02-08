<?php

namespace Core;

enum ReturnCodes: int
{
    case USER_ERROR                 = 7;
    case USER_ALERT                 = 5;
    case USER_SUCCESS               = 10;

    case INTERNAL_ERROR             = 97;
    case INTERNAL_CRITICAL_ERROR    = 100;
    case INTERNAL_API_ERROR         = 125;
}
