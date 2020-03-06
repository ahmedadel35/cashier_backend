<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Model
{
    public function brands(): HasMany
    {
        return $this->hasMany(Brand::class, 'typeId');
    }

    public function bills(): HasMany
    {
        return $this->hasMany(Bill::class, 'typeId');
    }
}
