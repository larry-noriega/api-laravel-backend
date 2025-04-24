<?php

  declare(strict_types=1);

  namespace App\Application\Services;

  use App\Domain\Models\TransactionModel;
  use App\Domain\TransactionServiceInterface;
  use \App\Domain\Repository\CustomerRepository;
  use \App\Domain\Repository\PaymentMethodRepository;
  use \App\Domain\Repository\TransactionRepository;
  use Illuminate\Pagination\LengthAwarePaginator;

  class TransactionService implements TransactionServiceInterface
  {
    private TransactionRepository $transactionRepository;
    private CustomerRepository $customerRepository;
    private PaymentMethodRepository $paymentMethodRepository;

    public function __construct(TransactionRepository $transactionRepository, CustomerRepository $customerRepository, PaymentMethodRepository $paymentMethodRepository)
    {
      $this->transactionRepository = $transactionRepository;
      $this->customerRepository = $customerRepository;
      $this->paymentMethodRepository = $paymentMethodRepository;
    }

    public function GetTransactionsReport(): LengthAwarePaginator
    {
      $transactions = $this->transactionRepository->GetTransactionPage();

      $customers = $this->customerRepository->GetCustomers();

      $paymentMethods = $this->paymentMethodRepository->GetPaymentMethods();

      foreach ($transactions as $transaction) {
        $transaction->customer = $customers->where('id', $transaction->customer_id)->first();

        $transaction->payment_method = $paymentMethods->where('id', $transaction->payment_method_id)->first();
      }

      return $transactions;
    }

    public function GetTransactionByID(int $id): TransactionModel
    {
      return $this->transactionRepository->GetTransactionByID($id);
    }
  }
