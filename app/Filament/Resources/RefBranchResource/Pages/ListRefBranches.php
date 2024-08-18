<?php

namespace App\Filament\Resources\RefBranchResource\Pages;

use App\Filament\Resources\RefBranchResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRefBranches extends ListRecords
{
    protected static string $resource = RefBranchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
