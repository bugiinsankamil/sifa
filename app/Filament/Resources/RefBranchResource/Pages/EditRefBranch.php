<?php

namespace App\Filament\Resources\RefBranchResource\Pages;

use App\Filament\Resources\RefBranchResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRefBranch extends EditRecord
{
    protected static string $resource = RefBranchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
