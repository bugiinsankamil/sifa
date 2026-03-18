<?php

namespace App\Filament\Resources\CoreBranches\Pages;

use App\Filament\Resources\CoreBranches\CoreBranchResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCoreBranches extends ListRecords
{
    protected static string $resource = CoreBranchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
