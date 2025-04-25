<?php

Declare(strict_types=1);

namespace App\Presenter\Http\Controllers\Api\V1;

use App\Domain\Repository\CurrencyRepository;
use App\Presenter\Http\Controllers\Api\V1\Controller;
use App\Presenter\Resources\CurrencyCollection;
use App\Presenter\Resources\CurrencyResource;

class CurrencyController extends Controller
{
    protected CurrencyRepository $currencyRepository;

    public function __construct(CurrencyRepository $currencyRepository) 
    {
        $this->currencyRepository = $currencyRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): CurrencyCollection
    {
        return new CurrencyCollection($this->currencyRepository->GetCurrencies());
    }
    
    /**
     * Display the specified resource.
     */
    public function show(int $id): CurrencyResource
    {
        return new CurrencyResource($this->currencyRepository->GetCurrencyByID($id));        
    }   
}
