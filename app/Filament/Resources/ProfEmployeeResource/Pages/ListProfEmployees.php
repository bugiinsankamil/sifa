<?php

namespace App\Filament\Resources\ProfEmployeeResource\Pages;

use App\Filament\Resources\ProfEmployeeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProfEmployees extends ListRecords
{
    protected static string $resource = ProfEmployeeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
