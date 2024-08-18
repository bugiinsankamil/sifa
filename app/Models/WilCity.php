<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WilCity extends Model
{
    public function wilProvince(): BelongsTo
    {
        return $this->belongsTo(WilProvince::class);
    }

    public function wilDistricts(): HasMany
    {
        return $this->hasMany(WilDistrict::class);
    }
}
