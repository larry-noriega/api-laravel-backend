<?php

declare(strict_types=1);

namespace App\Domain\Models;

use App\Domain\Enums\CurrencyEnum;
use Illuminate\Database\Eloquent\Model;

class CurrencyModel extends Model
{
    protected $casts = [
        'value' => CurrencyEnum::class
    ];
}
