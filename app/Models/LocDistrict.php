<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocDistrict extends Model
{
    //
    protected $guarded = ['id'];

    public  $timestamps = false;

    public function locRegency()
    {
        return $this->belongsTo(LocRegency::class);
    }

    public function locProvince()
    {
        return $this->belongsTo(LocProvince::class);
    }
}
