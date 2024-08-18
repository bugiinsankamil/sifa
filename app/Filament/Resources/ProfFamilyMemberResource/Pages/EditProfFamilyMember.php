<?php

namespace App\Filament\Resources\ProfFamilyMemberResource\Pages;

use App\Filament\Resources\ProfFamilyMemberResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProfFamilyMember extends EditRecord
{
    protected static string $resource = ProfFamilyMemberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
