<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfStudentResource\Pages;
use App\Filament\Resources\ProfStudentResource\RelationManagers;
use App\Models\ProfStudent;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProfStudentResource extends Resource
{
    protected static ?string $model = ProfStudent::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationGroup(): ?string
    {
        return __('Profile');
    }

    public static function getNavigationLabel(): string
    {
        return __('Student');
    }

    public static function getModelLabel(): string
    {
        return __('Student');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('ref_branch_id')
                    ->label('Branch')
                    ->relationship('ref_branch', 'name')
                    ->required(),
                Forms\Components\Select::make('ref_school_id')
                    ->label('School')
                    ->relationship('ref_school', 'name')
                    ->required(),
                Forms\Components\Select::make('ref_school_origin_id')
                    ->label('School origin')
                    ->relationship('ref_school_origin', 'name'),
                Forms\Components\Select::make('prof_family_id')
                    ->label('Parent/family')
                    ->relationship('prof_family', 'id'),
                Forms\Components\TextInput::make('nis')
                    ->label('NIS')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nik')
                    ->label('NIK')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('no_kk')
                    ->label('No KK')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nisn')
                    ->label('NISN')
                    ->maxLength(255),
                Forms\Components\TextInput::make('no_ujian')
                    ->label('Exam Number')
                    ->maxLength(255),
                Forms\Components\TextInput::make('no_kip')
                    ->label('No KIP')
                    ->maxLength(255),
                Forms\Components\TextInput::make('no_va_1')
                    ->label('No VA 1')
                    ->maxLength(255),
                Forms\Components\TextInput::make('no_va_2')
                    ->label('No VA 2')
                    ->maxLength(255),
                Forms\Components\TextInput::make('fullname')
                    ->required()
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
                Forms\Components\Select::make('fix_religion_id')
                    ->label('Religion')
                    ->relationship('fix_religion', 'name')
                    ->required(),
                Forms\Components\Select::make('fix_stifin_id')
                    ->label('STIFIn')
                    ->relationship('fix_stifin', 'name')
                    ->required(),
                Forms\Components\TextInput::make('nationality')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('entry_date'),
                Forms\Components\Select::make('fix_entry_status_id')
                    ->label('Entry Status')
                    ->relationship('fix_entry_status', 'name'),
                Forms\Components\DatePicker::make('exit_date'),
                Forms\Components\Select::make('fix_exit_status_id')
                    ->label('Exit Status')
                    ->relationship('fix_exit_status', 'name'),
                Forms\Components\Toggle::make('is_special_needs')
                    ->inline(false)
                    ->required(),
                Forms\Components\TextInput::make('special_needs')
                    ->maxLength(255),
                Forms\Components\Toggle::make('is_active')
                    ->inline(false)
                    ->default(true)
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
                Tables\Columns\TextColumn::make('ref_branch.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ref_school.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ref_school_origin.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('prof_family.id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nis')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nik')
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_kk')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nisn')
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_ujian')
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_kip')
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_va_1')
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_va_2')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fullname')
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
                Tables\Columns\TextColumn::make('entry_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fix_entry_status.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('exit_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fix_exit_status.name')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_special_needs')
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
            'index' => Pages\ListProfStudents::route('/'),
            'create' => Pages\CreateProfStudent::route('/create'),
            'edit' => Pages\EditProfStudent::route('/{record}/edit'),
        ];
    }
}
