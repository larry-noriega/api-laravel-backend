<?php

declare(strict_types=1);

namespace App\Infrastructure\DataBase;

use App\Domain\Models\Currency;
use App\Domain\Repository\CurrencyRepository;
use Illuminate\Database\Eloquent\Collection;

class EloquentCurrencyRepository implements CurrencyRepository
{

  /**
   * @inheritDoc
   */
  public function GetCurrencies(): Collection
  {
    return Currency::all();
  }
  
  /**
   * @inheritDoc
   */
  public function GetCurrencyById(int $id): ?Currency
  {
    return Currency::findOrFail($id);
  }
}
  