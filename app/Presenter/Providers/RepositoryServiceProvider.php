<?php

namespace App\Presenter\Providers;

use App\Domain\Repository\CustomerRepository;
use App\Domain\Repository\PaymentMethodRepository;
use App\Domain\Repository\TransactionRepository;
use App\Infrastructure\DataBase\EloquentCustomerRepository;
use App\Infrastructure\DataBase\EloquentPaymentMethodRepository;
use App\Infrastructure\DataBase\EloquentTransactionRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(PaymentMethodRepository::class, EloquentPaymentMethodRepository::class);
        $this->app->bind(TransactionRepository::class, EloquentTransactionRepository::class);
        $this->app->bind(CustomerRepository::class, EloquentCustomerRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
