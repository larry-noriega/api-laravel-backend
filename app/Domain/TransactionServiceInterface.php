<?php

declare(strict_types= 1);

namespace App\Domain;

use Illuminate\Pagination\LengthAwarePaginator;


interface TransactionServiceInterface
{
    /**
     * Summary of getTransactionsReport
     * @return LengthAwarePaginator
     */
    public function GetTransactionsReport(): LengthAwarePaginator;
}
