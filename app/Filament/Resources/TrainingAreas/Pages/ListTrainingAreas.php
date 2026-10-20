<?php

namespace App\Filament\Resources\TrainingAreas\Pages;

use App\Filament\Resources\TrainingAreas\TrainingAreaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTrainingAreas extends ListRecords
{
    protected static string $resource = TrainingAreaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
