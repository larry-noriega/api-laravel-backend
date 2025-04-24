<?php

declare(strict_types=1);

namespace App\Presenter\Http\Controllers;

use App\Domain\Repository\PaymentMethodRepository;
use App\Presenter\Http\Controllers\Controller;
use App\Presenter\Resources\PaymentMethodCollection;
use App\Presenter\Resources\PaymentMethodResource;

class PaymentMethodController extends Controller
{
    protected PaymentMethodRepository $paymentMethodRepository;

    public function __construct(PaymentMethodRepository $paymentMethodRepository)
    {
        $this->paymentMethodRepository = $paymentMethodRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function getPaymentsMethods(): PaymentMethodCollection
    {
        return new PaymentMethodCollection($this->paymentMethodRepository->GetPaymentMethods());
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $name): PaymentMethodResource
    {
        return new PaymentMethodResource($this->paymentMethodRepository->GetPaymentMethodByName($name));        
    }
}