<?php

declare(strict_types=1);

namespace App\Presenter\Http\Controllers;

use App\Application\Services\PaymentService;
use App\Presenter\Http\Controllers\Controller;
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
    public function createPayment(Request $request): JsonResponse
    {
        $transaction = $this->paymentService->createPayment($request);

        return response()->json($transaction, Response::HTTP_CREATED);
    }

    /**
     * Summary of generatePayment
     * @param Request $request
     * @return JsonResponse|mixed
     */
    public function generatePayment(Request $request): JsonResponse
    {
        $transaction = $this->paymentService->generatePayment($request);
        
        return response()->json([
            'status' => 'success',
            'transaction_id' => $transaction,
            Response::HTTP_CREATED
        ]);
    }   
}
