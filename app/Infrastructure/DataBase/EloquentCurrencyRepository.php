<?php

declare(strict_types=1);

namespace App\Infrastructure\DataBase;

use App\Domain\Models\CurrencyModel;
use App\Domain\Repository\CurrencyRepository;
use Illuminate\Database\Eloquent\Collection;

class EloquentCurrencyRepository implements CurrencyRepository
{

  /**
   * @inheritDoc
   */
  public function GetCurrencies(): Collection
  {
    return CurrencyModel::all();
  }
  
  /**
   * @inheritDoc
   */
  public function GetCurrencyById(int $id): ?CurrencyModel
  {
    return CurrencyModel::findOrFail($id);
  }
}
  