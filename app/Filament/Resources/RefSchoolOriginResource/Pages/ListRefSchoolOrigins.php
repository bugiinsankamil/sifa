<?php

namespace App\Filament\Resources\RefSchoolOriginResource\Pages;

use App\Filament\Resources\RefSchoolOriginResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRefSchoolOrigins extends ListRecords
{
    protected static string $resource = RefSchoolOriginResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
