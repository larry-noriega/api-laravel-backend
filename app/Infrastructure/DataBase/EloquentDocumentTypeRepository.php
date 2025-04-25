<?php

declare(strict_types= 1);

namespace App\Infrastructure\DataBase;

use App\Domain\Models\DocumentTypeModel;
use App\Domain\Repository\DocumentTypeRepository;
use Illuminate\Support\Collection;

class EloquentDocumentTypeRepository implements DocumentTypeRepository
{
  /**
   * @inheritDoc
   */
  public function GetAllDocumentTypes(): Collection
  {
    return DocumentTypeModel::all();
  }

  /**
   * @inheritDoc
   */
  public function GetDocumentTypeByID(int $id): ?DocumentTypeModel
  {
    return DocumentTypeModel::findOrFail($id);
  }
}