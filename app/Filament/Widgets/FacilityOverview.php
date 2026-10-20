<?php

namespace App\Filament\Widgets;

use App\Models\Facility;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class FacilityOverview extends StatsOverviewWidget
{
    protected ?string $heading = "Facilities";

    protected function getStats(): array
    {
        $total = Facility::count();
        $active = Facility::where('is_active', true)->count();
        $inactive = Facility::where('is_active', false)->count();

        return [
            Stat::make('Total facilities', $total),
            Stat::make('Active facilities', $active),
            Stat::make('Inactive facilities', $inactive),
        ];
    }
}
