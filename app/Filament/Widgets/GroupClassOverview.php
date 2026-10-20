<?php

namespace App\Filament\Widgets;

use App\Models\GroupClass;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class GroupClassOverview extends StatsOverviewWidget
{
    protected ?string $heading = "Group Classes";

    protected function getStats(): array
    {
        $total = GroupClass::count();
        $active = GroupClass::where('is_active', true)->count();
        $inactive = GroupClass::where('is_active', false)->count();

        return [
            Stat::make('Total group classes', $total),
            Stat::make('Active group classes', $active),
            Stat::make('Inactive group classes', $inactive),
        ];
    }
}
