<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WilDistrict extends Model
{
    public function wilCity(): BelongsTo
    {
        return $this->belongsTo(WilCity::class);
    }

    public function wilSubdistricts(): HasMany
    {
        return $this->hasMany(WilSubdistrict::class);
    }
}
