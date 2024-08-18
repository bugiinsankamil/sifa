<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RefSchoolOriginResource\Pages;
use App\Filament\Resources\RefSchoolOriginResource\RelationManagers;
use App\Models\RefSchoolOrigin;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RefSchoolOriginResource extends Resource
{
    protected static ?string $model = RefSchoolOrigin::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('fix_education_level_id')
                    ->required()
                    ->maxLength(26),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('wil_province_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('wil_city_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('wil_district_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('wil_subdistrict_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('contact_person')
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->tel()
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
                Tables\Columns\TextColumn::make('fix_education_level_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
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
