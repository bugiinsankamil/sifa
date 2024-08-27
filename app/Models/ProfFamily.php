<?php

namespace App\Models;

use App\Models\BaseModel as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProfFamily extends Model
{
    //

    public function prof_students(): HasMany
    {
        return $this->hasMany(ProfStudent::class);
    }

    public function father_education_level(): BelongsTo
    {
        return $this->belongsTo(FixEducationLevel::class, 'father_education_level_id');
    }

    public function mother_education_level(): BelongsTo
    {
        return $this->belongsTo(FixEducationLevel::class, 'mother_education_level_id');
    }

    public function father_profession(): BelongsTo
    {
        return $this->belongsTo(FixProfession::class, 'father_profession_id');
    }

    public function mother_profession(): BelongsTo
    {
        return $this->belongsTo(FixProfession::class, 'mother_profession_id');
    }

    public function wil_province(): BelongsTo
    {
        return $this->belongsTo(WilProvince::class);
    }

    public function wil_city(): BelongsTo
    {
        return $this->belongsTo(WilCity::class);
    }

    public function wil_district(): BelongsTo
    {
        return $this->belongsTo(WilDistrict::class);
    }

    public function wil_subdistrict(): BelongsTo
    {
        return $this->belongsTo(WilSubdistrict::class);
    }
}
