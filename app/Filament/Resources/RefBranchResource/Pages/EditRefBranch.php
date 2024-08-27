<?php

namespace App\Filament\Resources\RefBranchResource\Pages;

use App\Filament\Resources\RefBranchResource;
use App\Traits\RedirectIndex;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRefBranch extends EditRecord
{
    use RedirectIndex;

    protected static string $resource = RefBranchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
