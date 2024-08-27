<?php

namespace App\Filament\Resources\RefSchoolOriginResource\Pages;

use App\Filament\Resources\RefSchoolOriginResource;
use App\Traits\RedirectIndex;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRefSchoolOrigin extends CreateRecord
{
    use RedirectIndex;

    protected static string $resource = RefSchoolOriginResource::class;
}
