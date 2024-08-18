<?php

namespace App\Filament\Resources\ProfFamilyResource\Pages;

use App\Filament\Resources\ProfFamilyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProfFamilies extends ListRecords
{
    protected static string $resource = ProfFamilyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
