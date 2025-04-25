<?php

declare(strict_types=1);

namespace App\Domain\Models;

use App\Domain\Models\Transaction;
use App\Domain\Enums\DocumentTypeEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Customer extends Model
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

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }

    public function setNumberDocumentAttribute($value)
    {
        $this->attributes['number_document'] = strtoupper($value);
    }

    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtoupper($value);
    }

    public function Transactions(): HasMany {
        return $this->hasMany(Transaction::class);
    }
}