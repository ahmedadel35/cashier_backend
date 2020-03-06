<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bill extends Model
{
    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class, 'typeId');
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brandId');
    }
}
