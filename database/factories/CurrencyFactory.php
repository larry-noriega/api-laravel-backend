<?php

namespace Database\Factories;

use App\Domain\Models\Currency;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<Currency>
 */
class CurrencyFactory extends Factory
{
    /** @use HasFactory<CurrencyFactory> */
    use HasFactory;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
        ];
    }

    /**
     * Indicate that the currency should have a specific name.
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

    /**
     * Indicate that the currency should have a specific preset value.
     *
     * @param array $values
     * @return static
     */
    public function withValues(array $values): static
    {
        return $this->state([
            'value' => implode(',', $values),
        ]);
    }
}
