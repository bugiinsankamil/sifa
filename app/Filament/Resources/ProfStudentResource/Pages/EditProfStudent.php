<?php

namespace App\Filament\Resources\ProfStudentResource\Pages;

use App\Filament\Resources\ProfStudentResource;
use App\Traits\RedirectIndex;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProfStudent extends EditRecord
{
    use RedirectIndex;

    protected static string $resource = ProfStudentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
