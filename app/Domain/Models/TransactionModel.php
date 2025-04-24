<?php

declare(strict_types=1);

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use App\Domain\Enums\PaymentMethodEnum;
use App\Domain\Enums\CurrencyEnum;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransactionModel extends Model
{
  protected $table = "transactions";  

  protected $fillable = [
    'customer_id',
    'payment_method_id',
    'amount',
    'currency',
    'fee',
    'total',
    'status',
    'metadata'
  ];

  public $timestamps = true;

  protected $casts = [
    'payment_method_id' => PaymentMethodEnum::class,
    'currency' => CurrencyEnum::class
  ];

  public function Customer(): BelongsTo {
      return $this->belongsTo(CustomerModel::class);
  }
}