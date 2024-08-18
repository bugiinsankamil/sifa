<?php

namespace App\Filament\Resources\ProfFamilyMemberResource\Pages;

use App\Filament\Resources\ProfFamilyMemberResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProfFamilyMembers extends ListRecords
{
    protected static string $resource = ProfFamilyMemberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
