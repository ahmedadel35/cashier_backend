<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Brand extends Model
{

    public function type(): BelongsTo {
        return $this->BelongsTo(Type::class, 'typeId');
    }
}
