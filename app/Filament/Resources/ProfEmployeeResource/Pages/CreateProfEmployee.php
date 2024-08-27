<?php

namespace App\Filament\Resources\ProfEmployeeResource\Pages;

use App\Filament\Resources\ProfEmployeeResource;
use App\Traits\RedirectIndex;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProfEmployee extends CreateRecord
{
    use RedirectIndex;

    protected static string $resource = ProfEmployeeResource::class;
}
