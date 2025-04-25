<?php

declare(strict_types= 1);

use App\Presenter\Http\Controllers\Api\V1\CurrencyController;
use App\Presenter\Http\Controllers\Api\V1\DocumentTypeController;
use App\Presenter\Http\Controllers\Api\V1\PaymentController;
use App\Presenter\Http\Controllers\Api\V1\PaymentMethodController;
use App\Presenter\Http\Controllers\Api\V1\TransactionController;
use Illuminate\Support\Facades\Route;

//api/v1
Route::group(['prefix'=> 'v1', 'namespace' => 'App\Presenter\Http\Controllers\Api\V1'], function() {
  Route::apiResource('paymentMethods', PaymentMethodController::class);
  Route::apiResource('documentTypes', DocumentTypeController::class);
  Route::apiResource('currencies', CurrencyController::class);
  Route::apiResource('transactions', TransactionController::class);
  Route::apiResource('payment', PaymentController::class);
    Route::put('payment', [PaymentController::class, 'update'])->name('generatePayment.update');
});