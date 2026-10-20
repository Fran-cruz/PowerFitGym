<?php

namespace App\Filament\Widgets;

use App\Models\ContactMessage;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ContactMessageOverview extends StatsOverviewWidget
{
    protected ?string $heading = "Contact Messages";
    protected function getStats(): array
    {
        $total = ContactMessage::count();

        return [
            Stat::make('Total contact messages', $total),
        ];
    }
}
