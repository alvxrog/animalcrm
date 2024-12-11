<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Animal extends Model
{
    protected $fillable = [
        'name'
    ];
    public function client() : BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
