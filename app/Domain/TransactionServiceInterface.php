<?php

declare(strict_types= 1);

namespace App\Domain;

use Illuminate\Pagination\LengthAwarePaginator;
use App\Domain\Models\Transaction;


interface TransactionServiceInterface
{
    /**
     * Summary of getTransactionsReport
     * @return LengthAwarePaginator
     */
    public function GetTransactionsReport(): LengthAwarePaginator;

    public function GetTransactionByID(int $id): Transaction;
}
