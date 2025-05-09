<?php

declare(strict_types= 1);

namespace App\Domain\Repository;

use App\Domain\Models\DocumentType;
use Illuminate\Support\Collection;

interface DocumentTypeRepository
{

  public function GetAllDocumentTypes(): Collection;

  public function GetDocumentTypeByID(int $id): ?DocumentType;

}