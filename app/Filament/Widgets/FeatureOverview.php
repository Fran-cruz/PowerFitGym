<?php

namespace App\Filament\Widgets;

use App\Models\Feature;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class FeatureOverview extends StatsOverviewWidget
{
    protected ?string $heading = "Features";

    protected function getStats(): array
    {
        $total = Feature::count();
        $active = Feature::where('is_active', true)->count();
        $inactive = Feature::where('is_active', false)->count();

        return [
            Stat::make('Total features', $total),
            Stat::make('Active features', $active),
            Stat::make('Inactive features', $inactive),
        ];
    }
}
