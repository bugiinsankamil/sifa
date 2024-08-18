<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RefSchoolResource\Pages;
use App\Filament\Resources\RefSchoolResource\RelationManagers;
use App\Models\FixEducationLevel;
use App\Models\RefBranch;
use App\Models\RefSchool;
use App\Models\WilCity;
use App\Models\WilDistrict;
use App\Models\WilProvince;
use App\Models\WilSubdistrict;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;

class RefSchoolResource extends Resource
{
    protected static ?string $model = RefSchool::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationGroup(): ?string
    {
        return __('Reference Data');
    }

    public static function getNavigationLabel(): string
    {
        return __('School');
    }

    public static function getModelLabel(): string
    {
        return __('school');
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('ref_branch_id')
                    ->label('Branch')
                    ->required()
                    ->options(RefBranch::query()->pluck('name', 'id'))
                    ->live(),
                Select::make('fix_education_level_id')
                    ->label('Education Level')
                    ->required()
                    ->options(FixEducationLevel::query()->pluck('name', 'id')),
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('num_code')
                    ->label('Num Code')
                    ->required()
                    ->maxLength(4),
                TextInput::make('npsn')
                    ->label('NPSN')
                    ->required()
                    ->maxLength(10),
                Toggle::make('is_active')
                    ->required()
                    ->inline(false)
                    ->default(true),
                Textarea::make('info')
                    ->columnSpanFull(),
                Toggle::make('same_address_as_branch')
                    ->columnSpan(2)
                    ->required()
                    ->dehydrated(false)
                    ->inline(false)
                    ->live()
                    ->afterStateUpdated(function (Set $set, $state, Get $get) {
                        if ($state) {
                            $ref_branch = RefBranch::find($get('ref_branch_id'));
                            // dd($state);

                            $set('address', $ref_branch->address ?? null);
                            $set('wil_province_id', $ref_branch->wil_province_id ?? null);
                            $set('wil_city_id', $ref_branch->wil_city_id ?? null ?? null);
                            $set('wil_district_id', $ref_branch->wil_district_id ?? null);
                            $set('wil_subdistrict_id', $ref_branch->wil_subdistrict_id ?? null);
                            $set('phone', $ref_branch->phone ?? null);
                            $set('email', $ref_branch->email ?? null);
                        } else {
                            $set('address', null);
                            $set('wil_province_id', null);
                            $set('wil_city_id', null);
                            $set('wil_district_id', null);
                            $set('wil_subdistrict_id', null);
                            $set('phone', null);
                            $set('email', null);
                        }
                    }),
                Textarea::make('address')
                    ->required()
                    ->columnSpanFull()
                    ->hidden(fn (Get $get): bool => $get('same_address_as_branch')),
                Select::make('wil_province_id')
                    ->label('Province')
                    ->required()
                    ->options(WilProvince::query()->pluck('name', 'id'))
                    ->live()
                    ->hidden(fn (Get $get): bool => $get('same_address_as_branch')),
                Select::make('wil_city_id')
                    ->label('City')
                    ->required()
                    ->options(fn (Get $get): Collection => WilCity::query()->where('wil_province_id', $get('wil_province_id'))
                        ->pluck('name', 'id'))
                    ->live()
                    ->hidden(fn (Get $get): bool => $get('same_address_as_branch')),
                Select::make('wil_district_id')
                    ->label('District')
                    ->required()
                    ->options(fn (Get $get): Collection => WilDistrict::query()->where('wil_city_id', $get('wil_city_id'))
                        ->pluck('name', 'id'))
                    ->live()
                    ->hidden(fn (Get $get): bool => $get('same_address_as_branch')),
                Select::make('wil_subdistrict_id')
                    ->label('Subdistrict')
                    ->required()
                    ->options(fn (Get $get): Collection => WilSubdistrict::query()->where('wil_district_id', $get('wil_district_id'))
                        ->pluck('name', 'id'))
                    ->live()
                    ->hidden(fn (Get $get): bool => $get('same_address_as_branch')),
                TextInput::make('phone')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Hidden::make('address'),
                Hidden::make('wil_province_id'),
                Hidden::make('wil_city_id'),
                Hidden::make('wil_district_id'),
                Hidden::make('wil_subdistrict_id'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('ref_branch.name')
                    ->label('Branch')
                    ->searchable(),
                TextColumn::make('fix_education_level.name')
                    ->label('Education Level')
                    ->searchable(),
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('num_code')
                    ->label('Num Code')
                    ->searchable(),
                TextColumn::make('npsn')
                    ->label('NPSN')
                    ->searchable(),
                TextColumn::make('wil_city.name')
                    ->label('City')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('phone')
                    ->searchable(),
                TextColumn::make('email')
                    ->searchable(),
                IconColumn::make('is_active')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
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
            'index' => Pages\ListRefSchools::route('/'),
            'create' => Pages\CreateRefSchool::route('/create'),
            'edit' => Pages\EditRefSchool::route('/{record}/edit'),
        ];
    }
}
