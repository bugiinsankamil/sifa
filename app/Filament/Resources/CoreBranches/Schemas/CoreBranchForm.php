<?php

namespace App\Filament\Resources\CoreBranches\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CoreBranchForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('location'),
                TextInput::make('name'),
                TextInput::make('alphabet_code'),
                TextInput::make('numeric_code'),
                TextInput::make('street_address'),
                TextInput::make('loc_district_id')
                    ->numeric(),
                TextInput::make('loc_village_id')
                    ->numeric(),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
