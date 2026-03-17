<?php

namespace App\Models;

use App\Models\BaseRefModel as Model;

class LocRegency extends Model
{
    //
    public function locProvince()
    {
        return $this->belongsTo(LocProvince::class);
    }
}
