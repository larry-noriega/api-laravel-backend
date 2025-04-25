<?php

namespace App\Domain\Models;

use App\Domain\Enums\DocumentTypeEnum;
use Illuminate\Database\Eloquent\Model;

class DocumentTypeModel extends Model
{

    protected $casts = [
        'value' => DocumentTypeEnum::class
    ];
}
