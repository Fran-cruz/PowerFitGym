<?php

namespace App\Filament\Widgets;

use App\Models\TrainingArea;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TrainingAreaOverview extends StatsOverviewWidget
{
    protected ?string $heading = "Training Areas";

    protected function getStats(): array
    {
        $total = TrainingArea::count();
        $active = TrainingArea::where('is_active', true)->count();
        $inactive = TrainingArea::where('is_active', false)->count();

        return [
            Stat::make('Total training areas', $total),
            Stat::make('Active training areas', $active),
            Stat::make('Inactive training areas', $inactive),
        ];
    }
}
