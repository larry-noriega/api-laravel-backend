<?php

namespace App\Presenter\Http\Controllers\Api\V1;

use App\Domain\Repository\DocumentTypeRepository;
use App\Models\DocumentTypeModel;
use App\Presenter\Http\Controllers\Api\V1\Controller;
use App\Presenter\Resources\DocumentTypeCollection;
use App\Presenter\Resources\DocumentTypeResource;

class DocumentTypeController extends Controller
{
    protected DocumentTypeRepository $documentTypeRepository;

    public function __construct(DocumentTypeRepository $documentTypeRepository)
    {
        $this->documentTypeRepository = $documentTypeRepository;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new DocumentTypeCollection($this->documentTypeRepository->GetAllDocumentTypes());
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        return new DocumentTypeResource($this->documentTypeRepository->GetDocumentTypeByID($id));
    }
}
