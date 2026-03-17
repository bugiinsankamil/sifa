<?php

namespace App\Models;

use App\Models\BaseRefModel as Model;

class LocVillage extends Model
{
    //
    public function locDistrict()
    {
        return $this->belongsTo(LocDistrict::class);
    }
}
