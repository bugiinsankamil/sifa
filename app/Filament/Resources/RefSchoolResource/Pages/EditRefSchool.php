<?php

namespace App\Filament\Resources\RefSchoolResource\Pages;

use App\Filament\Resources\RefSchoolResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRefSchool extends EditRecord
{
    protected static string $resource = RefSchoolResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
