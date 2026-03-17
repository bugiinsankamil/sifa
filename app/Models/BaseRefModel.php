<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseRefModel extends Model
{
    //
    protected $guarded = ['id'];

    public  $timestamps = false;
}
