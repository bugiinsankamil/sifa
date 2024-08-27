<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfStudentResource\Pages;
use App\Filament\Resources\ProfStudentResource\RelationManagers;
use App\Models\FixEducationLevel;
use App\Models\ProfFamily;
use App\Models\ProfStudent;
use App\Models\RefBranch;
use App\Models\RefSchool;
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
                Section::make(__('Reference Data'))
                    ->columns(2)
                    ->schema([
                        Select::make('ref_branch_id')
                            ->label(__('Branch'))
                            ->options(RefBranch::query()->pluck('name', 'id'))
                            ->required()
                            ->live()
                            ->afterStateUpdated(function (Set $set) {
                                $set('ref_school_id', null);
                            }),
                        Select::make('ref_school_id')
                            ->label(__('School'))
                            ->required()
                            ->options(fn(Get $get): Collection => RefSchool::query()->where('ref_branch_id', $get('ref_branch_id'))
                                ->pluck('name', 'id'))
                            ->live()
                            ->afterStateUpdated(function (Set $set) {
                                $set('wil_subdistrict_id', null);
                            }),
                        Select::make('ref_school_origin_id')
                            ->label(__('School Origin'))
                            ->relationship('ref_school_origin', 'name')
                            ->searchable()
                            ->preload()
                            ->createOptionForm([
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
                            ]),
                        Select::make('prof_family_id')
                            ->label(__('Parent/Family'))
                            ->relationship('prof_family', 'id')
                            ->getOptionLabelFromRecordUsing(fn(ProfFamily $record) => "Ayah: {$record->father_name}, Ibu: {$record->mother_name}")
                            ->searchable(['father_name', 'mother_name'])
                            ->preload()
                            ->createOptionForm([
                                Section::make(__('Main Data'))
                                    ->columns(2)
                                    ->schema([
                                        TextInput::make('nokk')
                                            ->label(__('No KK'))
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
                            ]),
                        TextInput::make('nis')
                            ->label(__('NIS'))
                            ->required()
                            ->maxLength(255),
                        TextInput::make('nik')
                            ->label(__('NIK'))
                            ->required()
                            ->maxLength(255),
                        TextInput::make('no_kk')
                            ->label(__('No KK'))
                            ->required()
                            ->maxLength(255),
                        TextInput::make('nisn')
                            ->label(__('NISN'))
                            ->maxLength(255),
                        TextInput::make('no_ujian')
                            ->label(__('Exam Number'))
                            ->maxLength(255),
                        TextInput::make('no_kip')
                            ->label(__('No KIP'))
                            ->maxLength(255),
                        TextInput::make('no_va_1')
                            ->label(__('No VA 1'))
                            ->maxLength(255),
                        TextInput::make('no_va_2')
                            ->label(__('No VA 2'))
                            ->maxLength(255),
                    ]),
                Section::make(__('Individual Identity'))
                    ->columns(2)
                    ->schema([
                        TextInput::make('fullname')
                            ->label(__('Fullname'))
                            ->required()
                            ->maxLength(255),
                        TextInput::make('nickname')
                            ->label(__('Nickname'))
                            ->maxLength(255),
                        TextInput::make('birthplace')
                            ->label(__('Birthplace'))
                            ->required()
                            ->maxLength(255),
                        DatePicker::make('birthdate')
                            ->label(__('Birthdate'))
                            ->required(),
                        TextInput::make('gender')
                            ->label(__('Gender'))
                            ->required()
                            ->maxLength(255),
                        Select::make('fix_religion_id')
                            ->label(__('Religion'))
                            ->relationship('fix_religion', 'name')
                            ->required(),
                        Select::make('fix_stifin_id')
                            ->label(__('STIFIn'))
                            ->relationship('fix_stifin', 'name')
                            ->required(),
                        TextInput::make('nationality')
                            ->label(__('Nationality'))
                            ->required()
                            ->maxLength(255),
                        Toggle::make('is_special_needs')
                            ->label(__('Is Special Needs'))
                            ->inline(false)
                            ->required(),
                        TextInput::make('special_needs')
                            ->label(__('Type of Special Needs'))
                            ->maxLength(255),
                    ]),
                Section::make(__('Registration Data'))
                    ->columns(2)
                    ->schema([
                        DatePicker::make('entry_date')
                            ->label(__('Entry Date')),
                        Select::make('fix_entry_status_id')
                            ->label(__('Entry Status'))
                            ->relationship('fix_entry_status', 'name'),
                        DatePicker::make('exit_date')
                            ->label(__('Exit Date')),
                        Select::make('fix_exit_status_id')
                            ->label(__('Exit Status'))
                            ->relationship('fix_exit_status', 'name'),
                        Toggle::make('is_active')
                            ->label(__('Is Active'))
                            ->inline(false)
                            ->default(true)
                            ->required(),
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
