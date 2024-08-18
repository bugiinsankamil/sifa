<?php

namespace App\Filament\Resources\RefSchoolOriginResource\Pages;

use App\Filament\Resources\RefSchoolOriginResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRefSchoolOrigin extends EditRecord
{
    protected static string $resource = RefSchoolOriginResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
