<?php

namespace App\Filament\Resources\CoreBranches\Pages;

use App\Filament\Resources\CoreBranches\CoreBranchResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCoreBranch extends ViewRecord
{
    protected static string $resource = CoreBranchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
