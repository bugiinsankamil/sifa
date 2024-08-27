<?php

namespace App\Filament\Resources\ProfFamilyResource\Pages;

use App\Filament\Resources\ProfFamilyResource;
use App\Traits\RedirectIndex;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProfFamily extends CreateRecord
{
    use RedirectIndex;

    protected static string $resource = ProfFamilyResource::class;
}
