<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfEmployeeResource\Pages;
use App\Filament\Resources\ProfEmployeeResource\RelationManagers;
use App\Models\ProfEmployee;
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
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;

class ProfEmployeeResource extends Resource
{
    protected static ?string $model = ProfEmployee::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationGroup(): ?string
    {
        return __('Profile');
    }

    public static function getNavigationLabel(): string
    {
        return __('Employee');
    }

    public static function getModelLabel(): string
    {
        return __('Employee');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(__('Personal Identity'))
                    ->columns(2)
                    ->schema([
                        TextInput::make('nokk')
                            ->label(__('No. KK')),
                        TextInput::make('nik')
                            ->label(__('NIK'))
                            ->unique(ignoreRecord: true)
                            ->required(),
                        TextInput::make('niy')
                            ->label(__('NIY')),
                        TextInput::make('nuptk')
                            ->label(__('NUPTK')),
                        TextInput::make('front_title')
                            ->label(__('Front Title')),
                        TextInput::make('full_name')
                            ->label(__('Fullname'))
                            ->required(),
                        TextInput::make('back_title')
                            ->label(__('Back Title')),
                        TextInput::make('nickname')
                            ->label(__('Nickname')),
                        TextInput::make('birthplace')
                            ->label(__('Birthplace'))
                            ->required(),
                        DatePicker::make('birthdate')
                            ->label(__('Birthdate'))
                            ->required(),
                        TextInput::make('gender')
                            ->label(__('Gender'))
                            ->required(),
                        Select::make('fix_religion_id')
                            ->label(__('Religion'))
                            ->relationship('fix_religion', 'name')
                            ->required(),
                        Select::make('fix_stifin_id')
                            ->label(__('STIFIn'))
                            ->relationship('fix_stifin', 'name')
                            ->required(),
                        Select::make('nationality')
                            ->label(__('Kewarganegaraan'))
                            ->options([
                                'WNI' => 'WNI',
                                'WNA' => 'WNA',
                            ])
                            ->required(),
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
                    ]),
                Section::make(__('Employment Data'))
                    ->columns(2)
                    ->schema([
                        Select::make('ref_branch_id')
                            ->label(__('Branch'))
                            ->relationship('ref_branch', 'name')
                            ->required(),
                        Toggle::make('is_active')
                            ->label(__('Active'))
                            ->inline(false)
                            ->default(true)
                            ->required(),
                        DatePicker::make('work_start_date')
                            ->label(__('Work Start Date')),
                        DatePicker::make('work_end_date')
                            ->label(__('Work End Date')),
                        Select::make('fix_employment_type')
                            ->label(__('Employment Type'))
                            ->relationship('fix_employment_type', 'name')
                            ->required(),
                        Select::make('fix_employment_status')
                            ->label(__('Employment Status'))
                            ->relationship('fix_employment_status', 'name')
                            ->required(),
                        TextInput::make('profile_picture')
                            ->label(__('Profile Picture')),
                        TextInput::make('avatar')
                            ->label(__('Avatar')),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ref_branch.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nokk')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nik')
                    ->searchable(),
                Tables\Columns\TextColumn::make('niy')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nuptk')
                    ->searchable(),
                Tables\Columns\TextColumn::make('front_title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('full_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('back_title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nickname')
                    ->searchable(),
                Tables\Columns\TextColumn::make('birthplace')
                    ->searchable(),
                Tables\Columns\TextColumn::make('birthdate')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('gender')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fix_religion.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fix_stifin.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nationality')
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
                Tables\Columns\TextColumn::make('work_start_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('work_end_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fix_employment_type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fix_employment_status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('profile_picture')
                    ->searchable(),
                Tables\Columns\TextColumn::make('avatar')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
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
            'index' => Pages\ListProfEmployees::route('/'),
            'create' => Pages\CreateProfEmployee::route('/create'),
            'edit' => Pages\EditProfEmployee::route('/{record}/edit'),
        ];
    }
}
