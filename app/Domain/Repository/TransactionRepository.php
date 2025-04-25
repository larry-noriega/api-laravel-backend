<?php

declare(strict_types=1);

namespace App\Domain\Repository;

use Illuminate\Pagination\LengthAwarePaginator;
use App\Domain\Models\Transaction;

interface TransactionRepository
{
  public function GetTransactionPage(): LengthAwarePaginator;
  public function GetTransactionByID(int $id): Transaction;
  public function CreateTransaction(Transaction $transaction): Transaction;
  public function UpdateTransaction(Transaction $transaction): Transaction;
}