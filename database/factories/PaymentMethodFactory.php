<?php

namespace Database\Factories;

use App\Domain\Models\PaymentMethod;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<PaymentMethod>
 */
class PaymentMethodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {       
        $config = json_encode(['fee' => rand(100, 1000)]);

        return [
            'config' => $config
        ];
    }

     /**
     * Indicate that the payment method should have a specific name.
     *
     * @param string $name
     * @return static
     */
    public function withName(string $name): static
    {
        return $this->state([
            'name' => $name,
        ]);
    }
}
