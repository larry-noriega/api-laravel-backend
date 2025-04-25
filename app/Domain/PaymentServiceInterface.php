<?php

declare(strict_types= 1);

namespace App\Domain;

use App\Domain\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;


interface PaymentServiceInterface
{
    /**
     * Summary of getTransactionsReport
     * @return LengthAwarePaginator
     */
    public function createPayment(Request $request): array;

    /**
     * Summary of generatePayment
     * @param Request $request
     * @return void
     */
    public function generatePayment(Request $request): Transaction;
}
