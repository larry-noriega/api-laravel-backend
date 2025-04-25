<?php

declare(strict_types=1);

namespace App\Domain\Repository;

use App\Domain\Models\Customer;
use Illuminate\Support\Collection;

interface CustomerRepository
{
  /**
   * Summary of GetCustomers
   * @return Collection<int, Customer>
   */
  public function GetCustomers(): Collection;

  public function GetCustomerByDocument(string $number_document): ?Customer;

  public function CreateCustomer(Customer $customer_model): Customer;
}