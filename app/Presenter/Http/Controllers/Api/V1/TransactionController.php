<?php

declare(strict_types=1);

namespace App\Presenter\Http\Controllers\Api\V1;

use App\Domain\TransactionServiceInterface;
use App\Presenter\Http\Controllers\Api\V1\Controller;
use App\Presenter\Resources\CustomerResource;
use App\Presenter\Resources\PaymentMethodResource;
use App\Presenter\Resources\TransactionCollection;
use App\Presenter\Resources\TransactionResource;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    protected TransactionServiceInterface $transactionService;

    public function __construct(TransactionServiceInterface $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    /**
     * Summary of getTransactions
     * @param Request $request
     * @return TransactionCollection
     */
    public function index(): TransactionCollection
    {
        $transactions = $this->transactionService->GetTransactionsReport();

        foreach ($transactions as $transaction) {
            $transaction->customer = new CustomerResource(resource: $transaction->customer);

            $transaction->payment_method = new PaymentMethodResource(resource: $transaction->payment_method);
        }

        return new TransactionCollection($transactions);
    }
    
    /**
     * Summary of getTransaction
     * @param Request $request
     * @return TransactionResource
     */
    public function show(int $id): TransactionResource
    {
        return new TransactionResource($this->transactionService->GetTransactionByID( (int)$id));     
    }

    
}