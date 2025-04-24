<?php

declare(strict_types=1);

namespace App\Domain\Repository;

use App\Domain\Models\CustomerModel;
use Illuminate\Support\Collection;

interface CustomerRepository
{
  /**
   * Summary of GetCustomers
   * @return Collection<int, CustomerModel>
   */
  public function GetCustomers(): Collection;

  public function GetCustomerByDocument(string $number_document): ?CustomerModel;

  public function CreateCustomer(CustomerModel $customer_model): CustomerModel;
}