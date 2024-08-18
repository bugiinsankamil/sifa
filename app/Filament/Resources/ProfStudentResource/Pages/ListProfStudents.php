<?php

namespace App\Filament\Resources\ProfStudentResource\Pages;

use App\Filament\Resources\ProfStudentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProfStudents extends ListRecords
{
    protected static string $resource = ProfStudentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
