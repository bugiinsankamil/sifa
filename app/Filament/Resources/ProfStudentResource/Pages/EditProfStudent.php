<?php

namespace App\Filament\Resources\ProfStudentResource\Pages;

use App\Filament\Resources\ProfStudentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProfStudent extends EditRecord
{
    protected static string $resource = ProfStudentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
