<?php

declare(strict_types=1);

namespace App\Infrastructure\DataBase;

use App\Domain\Models\PaymentMethodModel;
use App\Domain\Repository\PaymentMethodRepository;
use Illuminate\Support\Collection;

class EloquentPaymentMethodRepository implements PaymentMethodRepository
{
  /**
   * Summary of GetTransactionPage
   * @return Collection<int, PaymentMethodModel>
   */
  public function GetPaymentMethods(): Collection
  {
    return PaymentMethodModel::all();    
  }   
  
  public function GetPaymentMethodByName(string $name): ?PaymentMethodModel
  {
    return PaymentMethodModel::where('name', $name)->first();
  }
}

