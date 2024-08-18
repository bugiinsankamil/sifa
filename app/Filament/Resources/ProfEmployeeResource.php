<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfEmployeeResource\Pages;
use App\Filament\Resources\ProfEmployeeResource\RelationManagers;
use App\Models\ProfEmployee;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

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
                Forms\Components\TextInput::make('ref_branch_id')
                    ->required()
                    ->maxLength(26),
                Forms\Components\TextInput::make('nokk')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nik')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('niy')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nuptk')
                    ->maxLength(255),
                Forms\Components\TextInput::make('front_title')
                    ->maxLength(255),
                Forms\Components\TextInput::make('full_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('back_title')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nickname')
                    ->maxLength(255),
                Forms\Components\TextInput::make('birthplace')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('birthdate')
                    ->required(),
                Forms\Components\TextInput::make('gender')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('fix_religion_id')
                    ->required()
                    ->maxLength(26),
                Forms\Components\TextInput::make('fix_stifin_id')
                    ->required()
                    ->maxLength(26),
                Forms\Components\TextInput::make('nationality')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('work_start_date'),
                Forms\Components\DatePicker::make('work_end_date'),
                Forms\Components\TextInput::make('fix_employment_type')
                    ->required()
                    ->maxLength(26),
                Forms\Components\TextInput::make('fix_employment_status')
                    ->required()
                    ->maxLength(26),
                Forms\Components\TextInput::make('profile_picture')
                    ->maxLength(255),
                Forms\Components\TextInput::make('avatar')
                    ->maxLength(255),
                Forms\Components\Toggle::make('is_active')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ref_branch_id')
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
                Tables\Columns\TextColumn::make('fix_religion_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fix_stifin_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nationality')
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
