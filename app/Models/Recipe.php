<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Recipe extends Model
{
    protected $fillable = ['record_id', 'recipeno', 'provisionType', 'file_url'];

    public function record() : BelongsTo
    {
        return $this->belongsTo(Record::class);
    }
}
