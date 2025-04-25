<?php

declare(strict_types= 1);

namespace App\Infrastructure\DataBase;

use App\Domain\Models\DocumentType;
use App\Domain\Repository\DocumentTypeRepository;
use Illuminate\Support\Collection;

class EloquentDocumentTypeRepository implements DocumentTypeRepository
{
  /**
   * @inheritDoc
   */
  public function GetAllDocumentTypes(): Collection
  {
    return DocumentType::all();
  }

  /**
   * @inheritDoc
   */
  public function GetDocumentTypeByID(int $id): ?DocumentType
  {
    return DocumentType::findOrFail($id);
  }
}