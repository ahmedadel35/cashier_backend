<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Model
{
    protected $fillable = ['name', 'price'];

    public function type(): BelongsTo
    {
        return $this->BelongsTo(Type::class, 'typeId');
    }

    public function bills(): HasMany
    {
        return $this->hasMany(Bill::class, 'brandId');
    }
}
