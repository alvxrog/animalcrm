<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Recipe extends Model
{
    public function record() : BelongsTo
    {
        return $this->belongsTo(Record::class);
    }
}
