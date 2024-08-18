<?php

namespace App\Models;

use App\Models\BaseModel as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProfStudent extends Model
{
    //

    public function ref_branch(): BelongsTo
    {
        return $this->belongsTo(RefBranch::class);
    }

    public function ref_school(): BelongsTo
    {
        return $this->belongsTo(RefSchool::class);
    }

    public function ref_school_origin(): BelongsTo
    {
        return $this->belongsTo(RefSchoolOrigin::class);
    }

    public function prof_family(): BelongsTo
    {
        return $this->belongsTo(ProfFamily::class);
    }

    public function fix_religion(): BelongsTo
    {
        return $this->belongsTo(FixReligion::class);
    }

    public function fix_stifin(): BelongsTo
    {
        return $this->belongsTo(FixStifin::class);
    }

    public function fix_entry_status(): BelongsTo
    {
        return $this->belongsTo(FixEntryStatus::class);
    }

    public function fix_exit_status(): BelongsTo
    {
        return $this->belongsTo(FixExitStatus::class);
    }
}
