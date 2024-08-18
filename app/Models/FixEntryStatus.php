<?php

namespace App\Models;

use App\Models\BaseModel as Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FixEntryStatus extends Model
{
    //

    public function prof_students(): HasMany
    {
        return $this->hasMany(ProfStudent::class);
    }
}
