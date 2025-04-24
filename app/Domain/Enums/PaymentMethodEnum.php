<?php

namespace App\Domain\Enums;

enum PaymentMethodEnum: int {
    case Cash = 1;
    case Online = 2;
    case Crypto = 3;
}
