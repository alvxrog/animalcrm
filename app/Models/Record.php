<?php

namespace App\Models;

use App\PrescriptionType;
use App\Treatment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Record extends Model
{
    //
    protected $fillable = [
        'client_id',
        'animal_id',
        'description',
        'date',
        'symptoms',
        'history',
        'medicine_history',
        'nourishmentm',
        'exam',
        'dps',
        'active_ingr',
        'quantity',
        'dose_freq',
        'admin_chann',
        'treat_duration',
        'prescr_type',
        'indications',
        'treatment',
        'warnings',
    ];

    protected $casts = [
        'date' => 'date',
        'prescr_type' => PrescriptionType::class,
        'treatment' => Treatment::class
    ];

    public function client() : BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function animal() : BelongsTo
    {
        return $this->belongsTo(Animal::class);
    }

    public function recipes() : HasMany
    {
        return $this->hasMany(Recipe::class);
    }
}
