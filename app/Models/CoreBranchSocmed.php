<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoreBranchSocmed extends Model
{
    //
    public function coreBranch()
    {
        return $this->belongsTo(CoreBranch::class);
    }

    public function refSocmedAccountType()
    {
        return $this->belongsTo(RefSocmedAccountType::class);
    }
}
