<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UserOverview extends StatsOverviewWidget
{
    protected ?string $heading = "Users";

    protected function getStats(): array
    {
        $total = User::count();

        return [
            Stat::make('Total users', $total),
        ];
    }
}
