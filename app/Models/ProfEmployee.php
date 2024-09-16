<?php

namespace App\Models;

use App\Models\BaseModel as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProfEmployee extends Model
{
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

    public function ref_branch(): BelongsTo
    {
        return $this->belongsTo(RefBranch::class);
    }

    public function fix_religion(): BelongsTo
    {
        return $this->belongsTo(FixReligion::class);
    }

    public function fix_stifin(): BelongsTo
    {
        return $this->belongsTo(FixStifin::class);
    }

    public function fix_employment_type(): BelongsTo
    {
        return $this->belongsTo(FixEmploymentType::class);
    }

    public function fix_employment_status(): BelongsTo
    {
        return $this->belongsTo(FixEmploymentStatus::class);
    }
}
