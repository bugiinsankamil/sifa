<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfFamilyResource\Pages;
use App\Filament\Resources\ProfFamilyResource\RelationManagers;
use App\Models\ProfFamily;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

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
                Forms\Components\TextInput::make('nokk')
                    ->required()
                    ->maxLength(16),
                Forms\Components\TextInput::make('father_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('father_nik')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('father_birthplace')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('father_birthdate')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('father_education_level_id')
                    ->required()
                    ->maxLength(26),
                Forms\Components\TextInput::make('father_profession_id')
                    ->required()
                    ->maxLength(26),
                Forms\Components\TextInput::make('father_profession_detail')
                    ->maxLength(255),
                Forms\Components\TextInput::make('father_income')
                    ->numeric(),
                Forms\Components\TextInput::make('mother_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('mother_nik')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('mother_birthplace')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('mother_birthdate')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('mother_education_level_id')
                    ->required()
                    ->maxLength(26),
                Forms\Components\TextInput::make('mother_profession_id')
                    ->required()
                    ->maxLength(26),
                Forms\Components\TextInput::make('mother_profession_detail')
                    ->maxLength(255),
                Forms\Components\TextInput::make('mother_income')
                    ->numeric(),
                Forms\Components\TextInput::make('number_of_children')
                    ->numeric(),
                Forms\Components\TextInput::make('address')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('wil_province_id')
                    ->numeric(),
                Forms\Components\TextInput::make('wil_city_id')
                    ->numeric(),
                Forms\Components\TextInput::make('wil_district_id')
                    ->numeric(),
                Forms\Components\TextInput::make('wil_subdistrict_id')
                    ->numeric(),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->maxLength(255),
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
                Tables\Columns\TextColumn::make('father_education_level_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('father_profession_id')
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
                Tables\Columns\TextColumn::make('mother_education_level_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mother_profession_id')
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
                Tables\Columns\TextColumn::make('wil_province_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('wil_city_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('wil_district_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('wil_subdistrict_id')
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
