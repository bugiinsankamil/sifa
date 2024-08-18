<?php

namespace App\Filament\Resources\ProfEmployeeResource\Pages;

use App\Filament\Resources\ProfEmployeeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProfEmployee extends EditRecord
{
    protected static string $resource = ProfEmployeeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
