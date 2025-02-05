<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Animal extends Model
{
    protected $fillable = [
        'name',
        'type',
        'sex',
        'dob',
        'breed',
        'breed_sec',
        'layer',
        'purpose',
        'client_id',
        'user_id',
        'microchipno',
    ];

    protected $casts = [
        'dob' => 'date'
    ];
    public function client() : BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    public function records() : HasMany
    {
        return $this->hasMany(Record::class);
    }

    public function latestRecord() : HasOne
    {
        return $this->hasOne(Record::class)->latest();
    }
}
