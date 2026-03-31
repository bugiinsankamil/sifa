<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoreBranch extends Model
{
    //
    public function locDistrict()
    {
        return $this->belongsTo(LocDistrict::class);
    }

    public function locVillage()
    {
        return $this->belongsTo(LocVillage::class);
    }

    public function coreBranchSocmeds()
    {
        return $this->hasMany(CoreBranchSocmed::class);
    }
}
