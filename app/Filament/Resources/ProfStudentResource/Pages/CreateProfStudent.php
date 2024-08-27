<?php

namespace App\Filament\Resources\ProfStudentResource\Pages;

use App\Filament\Resources\ProfStudentResource;
use App\Traits\RedirectIndex;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProfStudent extends CreateRecord
{
    use RedirectIndex;

    protected static string $resource = ProfStudentResource::class;
}
