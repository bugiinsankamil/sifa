<?php

namespace App\Filament\Resources\CoreBranches\Pages;

use App\Filament\Resources\CoreBranches\CoreBranchResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditCoreBranch extends EditRecord
{
    protected static string $resource = CoreBranchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
