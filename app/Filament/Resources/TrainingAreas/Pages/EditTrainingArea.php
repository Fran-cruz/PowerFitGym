<?php

namespace App\Filament\Resources\TrainingAreas\Pages;

use App\Filament\Resources\TrainingAreas\TrainingAreaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTrainingArea extends EditRecord
{
    protected static string $resource = TrainingAreaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
