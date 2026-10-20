<?php

namespace App\Filament\Resources\GroupClasses\Pages;

use App\Filament\Resources\GroupClasses\GroupClassResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditGroupClass extends EditRecord
{
    protected static string $resource = GroupClassResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
