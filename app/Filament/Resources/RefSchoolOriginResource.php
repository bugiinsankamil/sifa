<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RefSchoolOriginResource\Pages;
use App\Filament\Resources\RefSchoolOriginResource\RelationManagers;
use App\Models\RefSchoolOrigin;
use App\Models\WilCity;
use App\Models\WilDistrict;
use App\Models\WilProvince;
use App\Models\WilSubdistrict;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;

class RefSchoolOriginResource extends Resource
{
    protected static ?string $model = RefSchoolOrigin::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationGroup(): ?string
    {
        return __('Reference Data');
    }

    public static function getNavigationLabel(): string
    {
        return __('Sekolah Asal');
    }

    public static function getModelLabel(): string
    {
        return __('Sekolah Asal');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(__('Main Data'))
                    ->columns(2)
                    ->schema([
                        Select::make('fix_education_level_id')
                            ->label(__('Education Level'))
                            ->relationship(
                                'fix_education_level',
                                'name',
                                fn(Builder $query) => $query->orderBy('id')
                            )
                            ->required(),
                        TextInput::make('name')
                            ->label(__('Name'))
                            ->required(),
                    ]),
                Section::make(__('Contact Data'))
                    ->columns(2)
                    ->schema([
                        Select::make('wil_province_id')
                            ->label(__('Province'))
                            ->required()
                            ->options(WilProvince::query()->pluck('name', 'id'))
                            ->live()
                            ->afterStateUpdated(function (Set $set) {
                                $set('wil_city_id', null);
                                $set('wil_district_id', null);
                                $set('wil_subdistrict_id', null);
                            }),
                        Select::make('wil_city_id')
                            ->label(__('City'))
                            ->required()
                            ->options(fn(Get $get): Collection => WilCity::query()->where('wil_province_id', $get('wil_province_id'))
                                ->pluck('name', 'id'))
                            ->live()
                            ->afterStateUpdated(function (Set $set) {
                                $set('wil_district_id', null);
                                $set('wil_subdistrict_id', null);
                            }),
                        Select::make('wil_district_id')
                            ->label(__('District'))
                            ->required()
                            ->options(fn(Get $get): Collection => WilDistrict::query()->where('wil_city_id', $get('wil_city_id'))
                                ->pluck('name', 'id'))
                            ->live()
                            ->afterStateUpdated(function (Set $set) {
                                $set('wil_subdistrict_id', null);
                            }),
                        Select::make('wil_subdistrict_id')
                            ->label(__('Subdistrict'))
                            ->required()
                            ->options(fn(Get $get): Collection => WilSubdistrict::query()->where('wil_district_id', $get('wil_district_id'))
                                ->pluck('name', 'id'))
                            ->live(),
                        TextInput::make('contact_person')
                            ->label(__('Contact Person')),
                        TextInput::make('phone')
                            ->label(__('Phone'))
                            ->tel(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fix_education_level.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('wil_province.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('wil_city.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('wil_district.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('wil_subdistrict.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('contact_person')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRefSchoolOrigins::route('/'),
            'create' => Pages\CreateRefSchoolOrigin::route('/create'),
            'edit' => Pages\EditRefSchoolOrigin::route('/{record}/edit'),
        ];
    }
}
