<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocRegency extends Model
{
    //
    protected $guarded = ['id'];

    public  $timestamps = false;

    public function locProvince()
    {
        return $this->belongsTo(LocProvince::class);
    }
}
