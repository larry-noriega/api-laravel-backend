<?php

declare(strict_types= 1);

namespace App\Domain\Repository;

use App\Domain\Models\CurrencyModel;
use Illuminate\Database\Eloquent\Collection;

interface CurrencyRepository
{
  public function GetCurrencies(): Collection;

  public function GetCurrencyById(int $id): ?CurrencyModel;

}