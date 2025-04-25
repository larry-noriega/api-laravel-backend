<?php

namespace App\Presenter\Providers;

use App\Domain\Repository\CurrencyRepository;
use App\Domain\Repository\CustomerRepository;
use App\Domain\Repository\DocumentTypeRepository;
use App\Domain\Repository\PaymentMethodRepository;
use App\Domain\Repository\TransactionRepository;
use App\Infrastructure\DataBase\EloquentCurrencyRepository;
use App\Infrastructure\DataBase\EloquentCustomerRepository;
use App\Infrastructure\DataBase\EloquentDocumentTypeRepository;
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
        $this->app->bind(DocumentTypeRepository::class, EloquentDocumentTypeRepository::class);
        $this->app->bind(CurrencyRepository::class, EloquentCurrencyRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
