<?php

namespace App\Filament\Resources\CoreBranches;

use App\Filament\Resources\CoreBranches\Pages\CreateCoreBranch;
use App\Filament\Resources\CoreBranches\Pages\EditCoreBranch;
use App\Filament\Resources\CoreBranches\Pages\ListCoreBranches;
use App\Filament\Resources\CoreBranches\Pages\ViewCoreBranch;
use App\Filament\Resources\CoreBranches\Schemas\CoreBranchForm;
use App\Filament\Resources\CoreBranches\Schemas\CoreBranchInfolist;
use App\Filament\Resources\CoreBranches\Tables\CoreBranchesTable;
use App\Models\CoreBranch;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CoreBranchResource extends Resource
{
    protected static ?string $model = CoreBranch::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'location';

    public static function form(Schema $schema): Schema
    {
        return CoreBranchForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CoreBranchInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CoreBranchesTable::configure($table);
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
            'index' => ListCoreBranches::route('/'),
            'create' => CreateCoreBranch::route('/create'),
            'view' => ViewCoreBranch::route('/{record}'),
            'edit' => EditCoreBranch::route('/{record}/edit'),
        ];
    }
}
