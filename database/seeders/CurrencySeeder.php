<?php

namespace Database\Seeders;


use App\Domain\Enums\CurrencyEnum;
use App\Domain\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $documentTypes = [
            ['name' => 'Pesos', 'value' => CurrencyEnum::ColombianPeso->value],
            ['name' => 'Dólares', 'value' => CurrencyEnum::USDollar->value]
        ];

        foreach ($documentTypes as $document) {
            Currency::factory()
                ->withValues([$document['value']])
                ->withName($document['name'])
                ->create();
        }
    }
}
