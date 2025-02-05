<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    protected $fillable = [
        'name',
        'email',
        'identifno',
        'address',
        'phoneno',
        'user_id'
    ];

    //
    public function animals(): HasMany
    {
        return $this->hasMany(Animal::class);
    }

    public function records(): HasMany
    {
        return $this->hasMany(Record::class);
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
