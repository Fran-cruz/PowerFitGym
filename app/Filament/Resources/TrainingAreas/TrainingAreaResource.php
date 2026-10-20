<?php

namespace App\Filament\Resources\TrainingAreas;

use App\Filament\Resources\TrainingAreas\Pages\CreateTrainingArea;
use App\Filament\Resources\TrainingAreas\Pages\EditTrainingArea;
use App\Filament\Resources\TrainingAreas\Pages\ListTrainingAreas;
use App\Filament\Resources\TrainingAreas\Schemas\TrainingAreaForm;
use App\Filament\Resources\TrainingAreas\Tables\TrainingAreasTable;
use App\Models\TrainingArea;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TrainingAreaResource extends Resource
{
    protected static ?string $model = TrainingArea::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'TrainingArea';

    public static function form(Schema $schema): Schema
    {
        return TrainingAreaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TrainingAreasTable::configure($table);
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
            'index' => ListTrainingAreas::route('/'),
            'create' => CreateTrainingArea::route('/create'),
            'edit' => EditTrainingArea::route('/{record}/edit'),
        ];
    }
}
