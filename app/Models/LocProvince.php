<?php

namespace App\Models;

use App\Models\BaseRefModel as Model;

class LocProvince extends Model
{
    //
    public function locCountry()
    {
        return $this->belongsTo(LocCountry::class);
    }
}
