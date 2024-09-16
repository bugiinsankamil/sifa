<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfFamilyResource\Pages;
use App\Filament\Resources\ProfFamilyResource\RelationManagers;
use App\Models\ProfFamily;
use App\Models\WilCity;
use App\Models\WilDistrict;
use App\Models\WilProvince;
use App\Models\WilSubdistrict;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
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

class ProfFamilyResource extends Resource
{
    protected static ?string $model = ProfFamily::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationGroup(): ?string
    {
        return __('Profile');
    }

    public static function getNavigationLabel(): string
    {
        return __('Student Family');
    }

    public static function getModelLabel(): string
    {
        return __('Student Family');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(__('Main Data'))
                    ->columns(2)
                    ->schema([
                        TextInput::make('nokk')
                            ->label(__('Family Card Number'))
                            ->required(),
                        TextInput::make('number_of_children')
                            ->label(__('Number of Children'))
                            ->numeric(),
                    ]),
                Section::make(__('Father Data'))
                    ->columns(2)
                    ->schema([
                        TextInput::make('father_name')
                            ->label(__('Father Name'))
                            ->required(),
                        TextInput::make('father_nik')
                            ->label(__('Father NIK'))
                            ->required(),
                        TextInput::make('father_birthplace')
                            ->label(__('Father Birthplace'))
                            ->required(),
                        DatePicker::make('father_birthdate')
                            ->label(__('Father Birthdate'))
                            ->required(),
                        Select::make('father_education_level_id')
                            ->label(__('Father Education Level'))
                            ->relationship('father_education_level', 'name')
                            ->required(),
                        Select::make('father_profession_id')
                            ->label(__('Father Profession'))
                            ->relationship('father_profession', 'name')
                            ->required(),
                        TextInput::make('father_profession_detail')
                            ->label(__('Father Profession Detail')),
                        TextInput::make('father_income')
                            ->label(__('Father Income'))
                            ->numeric(),
                    ]),
                Section::make(__('Mother Data'))
                    ->columns(2)
                    ->schema([
                        TextInput::make('mother_name')
                            ->label(__('Mother Name'))
                            ->required(),
                        TextInput::make('mother_nik')
                            ->label(__('Mother NIK'))
                            ->required(),
                        TextInput::make('mother_birthplace')
                            ->label(__('Mother Birthplace'))
                            ->required(),
                        DatePicker::make('mother_birthdate')
                            ->label(__('Mother Birthdate'))
                            ->required(),
                        Select::make('mother_education_level_id')
                            ->label(__('Mother Education Level'))
                            ->relationship('mother_education_level', 'name')
                            ->required(),
                        Select::make('mother_profession_id')
                            ->label(__('Mother Profession'))
                            ->relationship('mother_profession', 'name')
                            ->required(),
                        TextInput::make('mother_profession_detail')
                            ->label(__('Mother Profession Detail')),
                        TextInput::make('mother_income')
                            ->label(__('Mother Income'))
                            ->numeric(),
                    ]),
                Section::make(__('Contact Data'))
                    ->columns(2)
                    ->schema([
                        Textarea::make('address')
                            ->label(__('Address'))
                            ->required()
                            ->columnSpanFull(),
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
                        TextInput::make('phone')
                            ->label(__('Phone'))
                            ->tel(),
                        TextInput::make('email')
                            ->label(__('E-mail'))
                            ->email(),
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
                Tables\Columns\TextColumn::make('nokk')
                    ->searchable(),
                Tables\Columns\TextColumn::make('father_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('father_nik')
                    ->searchable(),
                Tables\Columns\TextColumn::make('father_birthplace')
                    ->searchable(),
                Tables\Columns\TextColumn::make('father_birthdate')
                    ->searchable(),
                Tables\Columns\TextColumn::make('father_education_level.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('father_profession.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('father_profession_detail')
                    ->searchable(),
                Tables\Columns\TextColumn::make('father_income')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('mother_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mother_nik')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mother_birthplace')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mother_birthdate')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mother_education_level.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mother_profession.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mother_profession_detail')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mother_income')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('number_of_children')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('address')
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
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
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
            'index' => Pages\ListProfFamilies::route('/'),
            'create' => Pages\CreateProfFamily::route('/create'),
            'edit' => Pages\EditProfFamily::route('/{record}/edit'),
        ];
    }
}
