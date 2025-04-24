<?php

declare(strict_types=1);

namespace App\Presenter\Providers;

use App\Application\Services\PaymentService;
use App\Application\Services\TransactionService;
use App\Domain\PaymentServiceInterface;
use App\Domain\TransactionServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services after initialize the application.
     */
    public function register(): void
    {
        $this->app->bind(TransactionServiceInterface::class, TransactionService::class);
        $this->app->bind(PaymentServiceInterface::class, PaymentService::class);        
    }

    /**
     * Bootstrap any application services before initialize the application.
     */
    public function boot(): void
    {
        //
    }
}
