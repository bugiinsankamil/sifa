<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RefBranchResource\Pages;
use App\Filament\Resources\RefBranchResource\RelationManagers;
use App\Models\RefBranch;
use App\Models\WilCity;
use App\Models\WilDistrict;
use App\Models\WilProvince;
use App\Models\WilSubdistrict;
use Filament\Forms;
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

use function Pest\Laravel\get;

class RefBranchResource extends Resource
{
    protected static ?string $model = RefBranch::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationGroup(): ?string
    {
        return __('Reference Data');
    }

    public static function getNavigationLabel(): string
    {
        return __('Branch');
    }

    public static function getModelLabel(): string
    {
        return __('branch');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('num_code')
                    ->required()
                    ->maxLength(2),
                TextInput::make('alpha_code')
                    ->required()
                    ->maxLength(3),
                Textarea::make('address')
                    ->required()
                    ->columnSpanFull(),
                Select::make('wil_province_id')
                    ->label('Province')
                    ->required()
                    ->options(WilProvince::query()->pluck('name', 'id'))
                    ->live()
                    ->afterStateUpdated(function (Set $set) {
                        $set('wil_city_id', null);
                        $set('wil_district_id', null);
                        $set('wil_subdistrict_id', null);
                    }),
                Select::make('wil_city_id')
                    ->label('City')
                    ->required()
                    ->options(fn (Get $get): Collection => WilCity::query()->where('wil_province_id', $get('wil_province_id'))
                        ->pluck('name', 'id'))
                    ->live()
                    ->afterStateUpdated(function (Set $set) {
                        $set('wil_district_id', null);
                        $set('wil_subdistrict_id', null);
                    }),
                Select::make('wil_district_id')
                    ->label('District')
                    ->required()
                    ->options(fn (Get $get): Collection => WilDistrict::query()->where('wil_city_id', $get('wil_city_id'))
                        ->pluck('name', 'id'))
                    ->live()
                    ->afterStateUpdated(function (Set $set) {
                        $set('wil_subdistrict_id', null);
                    }),
                Select::make('wil_subdistrict_id')
                    ->label('Subdistrict')
                    ->required()
                    ->options(fn (Get $get): Collection => WilSubdistrict::query()->where('wil_district_id', $get('wil_district_id'))
                        ->pluck('name', 'id'))
                    ->live(),
                TextInput::make('phone')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Toggle::make('is_active')
                    ->required()
                    ->default(true),
                Textarea::make('info')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('num_code')
                    ->label(__('Num Code'))
                    ->searchable(),
                TextColumn::make('alpha_code')
                    ->label(__('Alpha Code'))
                    ->searchable(),
                TextColumn::make('wil_province.name')
                    ->label(__('Province'))
                    ->searchable(),
                TextColumn::make('wil_city.name')
                    ->label(__('City'))
                    ->searchable(),
                TextColumn::make('wil_district.name')
                    ->label(__('District'))
                    ->searchable(),
                TextColumn::make('wil_subdistrict.name')
                    ->label(__('Subdistrict'))
                    ->searchable(),
                TextColumn::make('phone')
                    ->label(__('Phone'))
                    ->searchable(),
                TextColumn::make('email')
                    ->label('E-mail')
                    ->searchable(),
                IconColumn::make('is_active')
                    ->label('Active')
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
            'index' => Pages\ListRefBranches::route('/'),
            'create' => Pages\CreateRefBranch::route('/create'),
            'edit' => Pages\EditRefBranch::route('/{record}/edit'),
        ];
    }
}
