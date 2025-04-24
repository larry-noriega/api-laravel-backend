<?php

declare(strict_types=1);

namespace App\Domain\Models;

use App\Domain\Models\TransactionModel;
use App\Domain\Enums\DocumentTypeEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CustomerModel extends Model
{
    protected $table = "customers";
    
    protected $fillable = [
        'name',
        'email',
        'type_document',
        'number_document',
        'preferences'
    ];

    public $timestamps = true;

    protected function casts(): array
    {
        return [
            'type_document' => DocumentTypeEnum::class,
        ];
    }

    public function Transactions(): HasMany {
        return $this->hasMany(TransactionModel::class);
    }
}