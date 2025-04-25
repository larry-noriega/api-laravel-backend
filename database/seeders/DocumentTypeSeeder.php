<?php

namespace Database\Seeders;

use App\Domain\Enums\DocumentTypeEnum;
use App\Domain\Models\DocumentType;
use Illuminate\Database\Seeder;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $documentTypes = [
            ['name' => 'CC', 'value' => DocumentTypeEnum::CC->value],
            ['name' => 'Pasaporte', 'value' => DocumentTypeEnum::Passport->value],
            ['name' => 'Carnet de Extranjería', 'value' => DocumentTypeEnum::ImmigrationCard->value],
        ];

        foreach ($documentTypes as $document) {
            DocumentType::factory()
                ->withValues([$document['value']])
                ->withName($document['name'])
                ->create();
        }
    }
}
