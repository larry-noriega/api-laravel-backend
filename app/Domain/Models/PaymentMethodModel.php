<?php

declare(strict_types=1);

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethodModel extends Model
{
    protected $table = "payment_methods";

    protected $fillable = [
        'name',
        'config'
    ];

    public $timestamps = true;
}
