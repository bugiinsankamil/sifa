<?php

namespace App\Filament\Resources\RefSchoolResource\Pages;

use App\Filament\Resources\RefSchoolResource;
use App\Traits\RedirectIndex;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRefSchool extends EditRecord
{
    use RedirectIndex;

    protected static string $resource = RefSchoolResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
