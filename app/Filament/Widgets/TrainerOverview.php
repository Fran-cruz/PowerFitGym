<?php

namespace App\Filament\Widgets;

use App\Models\Trainer;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TrainerOverview extends StatsOverviewWidget
{
    protected ?string $heading = "Trainers";

    protected function getStats(): array
    {
        $total = Trainer::count();
        $active = Trainer::where('is_active', true)->count();
        $inactive = Trainer::where('is_active', false)->count();

        return [
            Stat::make('Total trainers', $total),
            Stat::make('Active trainers', $active),
            Stat::make('Inactive trainers', $inactive),
        ];
    }
}
