<?php

namespace App\Filament\Resources\RefSchoolOriginResource\Pages;

use App\Filament\Resources\RefSchoolOriginResource;
use App\Traits\RedirectIndex;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRefSchoolOrigin extends EditRecord
{
    use RedirectIndex;

    protected static string $resource = RefSchoolOriginResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
