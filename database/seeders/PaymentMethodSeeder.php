<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domain\Models\PaymentMethod;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paymentMethods = ['cash', 'online', 'crypto'];

        foreach ($paymentMethods as $methodName) {
            PaymentMethod::factory()
                ->withName($methodName)
                ->create();
        }
    }
}
