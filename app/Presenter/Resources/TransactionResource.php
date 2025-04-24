<?php

namespace App\Presenter\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=> $this->id,
            "customerId"=> $this->customer_id,
            "paymentMethodId"=> $this->payment_method_id,
            "amount"=> $this->amount,
            "currency"=> $this->currency,
            "fee"=> $this->fee,
            "total"=> $this->total,
            "status"=> $this->status,
            "metadata"=> $this->metadata,
            "customer" => $this->customer,
            "paymentMethod" => $this->payment_method,
        ];
    }
}
