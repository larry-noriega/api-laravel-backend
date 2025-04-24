<?php

declare(strict_types=1);

namespace App\Infrastructure\DataBase;

use App\Domain\Models\TransactionModel;
use App\Domain\Repository\TransactionRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class EloquentTransactionRepository implements TransactionRepository
{
  /**
   * Summary of GetTransactionPage
   * @return LengthAwarePaginator
   */
  public function GetTransactionPage(): LengthAwarePaginator
  {
    return TransactionModel::paginate();    
  }

  public function GetTransactionByID(int $id): TransactionModel
  {
    return TransactionModel::findOrFail(id: $id);
  }

  public function CreateTransaction(TransactionModel $transaction): TransactionModel
  {
    $transaction->save([$transaction]);

    return $transaction;
  }

  public function UpdateTransaction(TransactionModel $transaction): TransactionModel
  {
    $transaction = TransactionModel::where('id', $transaction->transaction_id)
    ->update([
        'customer_id' => $transaction->customerId,
        'payment_method_id' => $transaction->payment_method_id,
        'amount' => $transaction->amount,
        'currency' => $transaction->currency,
        'fee' => $transaction->fee,
        'total' => $transaction->total,
        'status' => 'completed',
        'metadata' => json_encode(['raw_data' => $transaction->metadata]), 
        'updated_at' => now()
    ]);

    $transaction = TransactionModel::findOrFail($transaction);

    return $transaction;
  }
}

