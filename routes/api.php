<?php


use App\Presenter\Http\Controllers\PaymentController;
use App\Presenter\Http\Controllers\PaymentMethodController;
use App\Presenter\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/getPaymentsMethods', [PaymentMethodController::class, 'getPaymentsMethods']);
Route::post('/generatePayment', [PaymentController::class, 'generatePayment']);
Route::post('/createPayment', [PaymentController::class, 'createPayment']);
Route::get('/getTransaction', [TransactionController::class, 'getTransaction']);
Route::get('/getTransactions', [TransactionController::class, 'getTransactions']);