<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocProvince extends Model
{
    protected $guarded = ['id'];

    public $timestamps = false;

    public function locCountry()
    {
        return $this->belongsTo(LocCountry::class);
    }
}
