<?php

namespace App\Filament\Resources\CoreBranches\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class CoreBranchInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('location')
                    ->placeholder('-'),
                TextEntry::make('name')
                    ->placeholder('-'),
                TextEntry::make('alphabet_code')
                    ->placeholder('-'),
                TextEntry::make('numeric_code')
                    ->placeholder('-'),
                TextEntry::make('street_address')
                    ->placeholder('-'),
                TextEntry::make('loc_district_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('loc_village_id')
                    ->numeric()
                    ->placeholder('-'),
                IconEntry::make('is_active')
                    ->boolean(),
            ]);
    }
}
