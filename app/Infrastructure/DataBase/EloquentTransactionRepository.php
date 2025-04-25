<?php

declare(strict_types=1);

namespace App\Infrastructure\DataBase;

use App\Domain\Models\Transaction;
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
    return Transaction::paginate();    
  }

  public function GetTransactionByID(int $id): Transaction
  {
    return Transaction::findOrFail(id: $id);
  }

  public function CreateTransaction(Transaction $transaction): Transaction
  {
    $transaction->save([$transaction]);

    return $transaction;
  }

  public function UpdateTransaction(Transaction $transaction): Transaction
  {
    $transaction = Transaction::where('id', $transaction->transaction_id)
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

    $transaction = Transaction::findOrFail($transaction);

    return $transaction;
  }
}

