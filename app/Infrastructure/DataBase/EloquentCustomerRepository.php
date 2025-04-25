<?php

declare(strict_types=1);

namespace App\Infrastructure\DataBase;

use App\Domain\Repository\CustomerRepository;
use \App\Domain\Models\Customer;
use Illuminate\Support\Collection;

class EloquentCustomerRepository implements CustomerRepository
{
  /**
   * Summary of GetCustomers
   * @return Collection<int, Customer>
   */
  public function GetCustomers(): Collection
  {
    return Customer::all();    
  }

  /**
   * Summary of GetCustomerByDocument
   * @param string $number_document
   * @return Customer|null
   */
  public function GetCustomerByDocument(string $number_document): ?Customer
  {
    return Customer::where('number_document', $number_document)->first();
  }

  /**
   * Summary of CreateCustomer
   * @param Customer $customer
   * @return Customer
   */
  public function CreateCustomer(Customer $customer): Customer
  {
    $customer->save([$customer]);

    return $customer;
  }
}
