<?php

namespace App\Filament\Resources\GroupClasses\Pages;

use App\Filament\Resources\GroupClasses\GroupClassResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListGroupClasses extends ListRecords
{
    protected static string $resource = GroupClassResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
