<?php

declare(strict_types=1);

namespace App\Application\Services;

use App\Domain\Models\CustomerModel;
use App\Domain\Models\TransactionModel;
use App\Domain\PaymentServiceInterface;
use \App\Domain\Repository\CustomerRepository;
use \App\Domain\Repository\PaymentMethodRepository;
use \App\Domain\Repository\TransactionRepository;
use Illuminate\Http\Request;

class PaymentService implements PaymentServiceInterface
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

  public function createPayment(Request $request): array
  {
    $data = $request->all();

    $customer = $this->customerRepository->GetCustomerByDocument($data['number_document']);

    if ($customer === null) {

      $customer = new CustomerModel();
      $customer->name = $data['name'];
      $customer->email = $data['email'];
      $customer->type_document = $data['type_document'];
      $customer->number_document = $data['number_document'];
      $customer->preferences = json_encode(['raw_data' => $data]);

      $customerCreated = $this->customerRepository->CreateCustomer($customer);

      $customer = $customerCreated;
    }

    $transaction = new TransactionModel();
    $transaction->customer_id = $customer->id;
    $transaction->amount = $data['amount'];
    $transaction->currency = $data['currency'];
    $transaction->status = 'pending';
    $transaction->metadata = json_encode(['raw_data' => $data]);

    $transactionCreated = $this->transactionRepository->CreateTransaction($transaction);

    return [
      'status' => 'success',
      'transaction_id' => $transactionCreated->id,
      'url_payment' => env('APP_PAYMENTGATEWAY') ? env('APP_PAYMENTGATEWAY') . '/' . $transactionCreated->id : 'http://localhost:5173/transaction/' . $transactionCreated->id
    ];
  }

  public function generatePayment(Request $request): TransactionModel 
  {
    $data = $request->all();

    $paymentMethod = $this->paymentMethodRepository->GetPaymentMethodByName($data['payment_method']);

    $fee = json_decode($paymentMethod->config)->fee ?? 0;
    $total = $data['amount'] + $fee;

    $transaction = TransactionModel::where('id', $data['transaction_id'])
      ->update([
        'customer_id' => $data['customerId'],
        'payment_method_id' => $paymentMethod->id,
        'amount' => $data['amount'],
        'currency' => $data['currency'],
        'fee' => $fee,
        'total' => $total,
        'status' => 'completed',
        'metadata' => json_encode(['raw_data' => $data]),
        'updated_at' => now()
      ]);

    $transaction = $this->transactionRepository->GetTransactionByID((int)$data['transaction_id']);

    return $transaction;
  }
}
