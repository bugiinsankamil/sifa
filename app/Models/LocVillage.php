<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocVillage extends Model
{
    //
    protected $guarded = ['id'];

    public  $timestamps = false;

    public function locDistrict()
    {
        return $this->belongsTo(LocDistrict::class);
    }
}
