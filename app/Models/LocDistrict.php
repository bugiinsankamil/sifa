<?php

namespace App\Models;

use App\Models\BaseRefModel as Model;

class LocDistrict extends Model
{
    //
    public function locRegency()
    {
        return $this->belongsTo(LocRegency::class);
    }

    public function locProvince()
    {
        return $this->belongsTo(LocProvince::class);
    }
}
