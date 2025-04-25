<?php

declare(strict_types=1);

namespace App\Presenter\Http\Controllers\Api\V1;

use App\Application\Services\PaymentService;
use  App\Presenter\Http\Controllers\Api\V1\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
 
class PaymentController extends Controller
{
    protected PaymentService $paymentService;

    public function __construct(PaymentService $transactionService)
    {
        $this->paymentService = $transactionService;
    }

    /**
     * Summary of createPayment
     * @param Request $request
     * @return JsonResponse|mixed
     */
    public function store(Request $request): JsonResponse
    {
        $transaction = $this->paymentService->createPayment($request);

        return response()->json($transaction, Response::HTTP_CREATED);
    }

    /**
     * Summary of generatePayment
     * @param Request $request
     * @return JsonResponse|mixed
     */
    public function update(Request $request): JsonResponse
    {
        $transaction = $this->paymentService->generatePayment($request);
        
        return response()->json([
            'status' => 'success',
            'transaction_id' => $transaction,
            Response::HTTP_CREATED
        ]);
    }   
}
