<?php

declare(strict_types=1);

namespace App\Infrastructure\DataBase;

use App\Domain\Repository\CustomerRepository;
use \App\Domain\Models\CustomerModel;
use Illuminate\Support\Collection;

class EloquentCustomerRepository implements CustomerRepository
{
  /**
   * Summary of GetCustomers
   * @return Collection<int, CustomerModel>
   */
  public function GetCustomers(): Collection
  {
    return CustomerModel::all();    
  }

  /**
   * Summary of GetCustomerByDocument
   * @param string $number_document
   * @return CustomerModel|null
   */
  public function GetCustomerByDocument(string $number_document): ?CustomerModel
  {
    return CustomerModel::where('number_document', $number_document)->first();
  }

  /**
   * Summary of CreateCustomer
   * @param CustomerModel $data
   * @return CustomerModel
   */
  public function CreateCustomer(CustomerModel $data): CustomerModel
  {
    return CustomerModel::create([$data]);
  }

  // public function create(User $user): void
  // {
  //     $userModel = new UserModel();
  //     $userModel->name = $user->getName();
  //     $userModel->email = $user->getEmail();
  //     $userModel->save();

  //     $user->setId($userModel->id);
  // }

}
