<?php

namespace App\Filament\Resources\RefSchoolResource\Pages;

use App\Filament\Resources\RefSchoolResource;
use App\Traits\RedirectIndex;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRefSchool extends CreateRecord
{
    use RedirectIndex;

    protected static string $resource = RefSchoolResource::class;
}
