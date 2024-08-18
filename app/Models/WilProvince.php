<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WilProvince extends Model
{
    public function wilCities(): HasMany
    {
        return $this->hasMany(WilCity::class);
    }
}
