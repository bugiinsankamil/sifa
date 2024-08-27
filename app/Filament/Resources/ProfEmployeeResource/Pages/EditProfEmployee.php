<?php

namespace App\Filament\Resources\ProfEmployeeResource\Pages;

use App\Filament\Resources\ProfEmployeeResource;
use App\Traits\RedirectIndex;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProfEmployee extends EditRecord
{
    use RedirectIndex;

    protected static string $resource = ProfEmployeeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
