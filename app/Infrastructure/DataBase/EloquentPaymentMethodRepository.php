<?php

declare(strict_types=1);

namespace App\Infrastructure\DataBase;

use App\Domain\Models\PaymentMethod;
use App\Domain\Repository\PaymentMethodRepository;
use Illuminate\Support\Collection;

class EloquentPaymentMethodRepository implements PaymentMethodRepository
{
  /**
   * Summary of GetTransactionPage
   * @return Collection<int, PaymentMethod>
   */
  public function GetPaymentMethods(): Collection
  {
    return PaymentMethod::all();    
  }   
  
  public function GetPaymentMethodByName(string $name): ?PaymentMethod
  {
    return PaymentMethod::where('name', $name)->first();
  }
}

