<?php

namespace App\Domain\Models;

use Database\Factories\PaymentMethodFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
  /** @use HasFactory<PaymentMethodModel> */
  use HasFactory;

  protected $model = PaymentMethod::class;

  protected $table = "payment_methods";

  protected $fillable = [
    'name',
    'config'
  ];

  public $timestamps = true;

  protected static function newFactory(): PaymentMethodFactory
  {
    return PaymentMethodFactory::new();
  }
}
