<?php

declare(strict_types=1);

namespace App\Domain\Repository;

use Illuminate\Pagination\LengthAwarePaginator;
use App\Domain\Models\TransactionModel;

interface TransactionRepository
{
  public function GetTransactionPage(): LengthAwarePaginator;
  public function GetTransactionByID(int $id): TransactionModel;
  public function CreateTransaction(TransactionModel $transaction): TransactionModel;
  public function UpdateTransaction(TransactionModel $transaction): TransactionModel;
}