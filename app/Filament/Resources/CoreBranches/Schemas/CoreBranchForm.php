<?php

namespace App\Filament\Resources\CoreBranches\Schemas;

use App\Models\LocDistrict;
use App\Models\LocVillage;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
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
                Select::make('loc_district_id')
                    ->label(__('Subdistrict'))
                    ->searchable()
                    ->getSearchResultsUsing(fn(string $search) => LocDistrict::query()
                        ->where('complete_name', 'like', "%{$search}%")
                        ->limit(20)
                        ->pluck('complete_name', 'id')
                        ->all())
                    ->getOptionLabelUsing(fn($value) => LocDistrict::find($value)?->complete_name ?? '')
                    ->afterStateUpdated(fn($set) => $set('loc_village_id', null))
                    ->required()
                    ->live(),
                Select::make('loc_village_id')
                    ->options(fn($get) => LocVillage::query()
                        ->where('loc_district_id', $get('loc_district_id'))
                        ->pluck('name', 'id')
                        ->all()),
                Toggle::make('is_active')
                    ->required(),
                Repeater::make('coreBranchSocmeds')
                    ->label('Sosial Media Accounts')
                    ->relationship('coreBranchSocmeds')
                    ->schema([
                        Select::make('ref_socmed_account_type_id')
                            ->relationship('refSocmedAccountType', 'name'),
                        TextInput::make('account_name_number'),
                        TextInput::make('account_url'),
                    ])
                    ->collapsible(),
            ]);
    }
}
