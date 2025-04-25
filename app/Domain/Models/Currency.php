<?php

declare(strict_types=1);

namespace App\Domain\Models;

use App\Domain\Enums\CurrencyEnum;
use Database\Factories\CurrencyFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $casts = [
        'value' => CurrencyEnum::class
    ];

    protected static function newFactory(): CurrencyFactory
    {
        return CurrencyFactory::new();
    }
}
