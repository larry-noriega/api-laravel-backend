<?php

declare(strict_types=1);

namespace App\Domain\Repository;

use App\Domain\Models\PaymentMethodModel;
use Illuminate\Support\Collection;

interface PaymentMethodRepository
{
    /**
     * Summary of GetTransactionPage
     * @return Collection<int, PaymentMethodModel>
     */
    public function GetPaymentMethods(): Collection;
    public function GetPaymentMethodByName(string $name): ?PaymentMethodModel;
}
