<?php

namespace App\Filament\Resources\GroupClasses;

use App\Filament\Resources\GroupClasses\Pages\CreateGroupClass;
use App\Filament\Resources\GroupClasses\Pages\EditGroupClass;
use App\Filament\Resources\GroupClasses\Pages\ListGroupClasses;
use App\Filament\Resources\GroupClasses\Schemas\GroupClassForm;
use App\Filament\Resources\GroupClasses\Tables\GroupClassesTable;
use App\Models\GroupClass;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class GroupClassResource extends Resource
{
    protected static ?string $model = GroupClass::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'GroupClass';

    public static function form(Schema $schema): Schema
    {
        return GroupClassForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GroupClassesTable::configure($table);
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
            'index' => ListGroupClasses::route('/'),
            'create' => CreateGroupClass::route('/create'),
            'edit' => EditGroupClass::route('/{record}/edit'),
        ];
    }
}
