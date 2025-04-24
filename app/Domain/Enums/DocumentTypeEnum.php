<?php

namespace App\Domain\Enums;

enum DocumentTypeEnum: string {
    case CC = 'CC';
    case Passport = 'PA';
    case ImmigrationCard = 'CE';
}
