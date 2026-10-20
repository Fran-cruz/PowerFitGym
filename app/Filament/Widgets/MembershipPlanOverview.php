<?php

namespace App\Filament\Widgets;

use App\Models\MembershipPlan;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class MembershipPlanOverview extends StatsOverviewWidget
{
    protected ?string $heading = "Membership Plans";

    protected function getStats(): array
    {
        $total = MembershipPlan::count();
        $active = MembershipPlan::where('is_active', true)->count();
        $inactive = MembershipPlan::where('is_active', false)->count();

        return [
            Stat::make('Total membership plans', $total),
            Stat::make('Active membership plans', $active),
            Stat::make('Inactive membership plans', $inactive),
        ];
    }
}
