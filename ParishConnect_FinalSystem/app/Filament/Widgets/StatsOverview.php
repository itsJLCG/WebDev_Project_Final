<?php
namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\User;
use App\Models\InKindDonation;
use App\Models\MoneyDonation;
use App\Models\Event;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $events = Event::all();

        $eventStats = $events->map(function ($event) {
            $status = ($event->EventDate < now()) ? 'Completed' : 'Upcoming';

            return Stat::make("Event", '')
                ->description('Title: ' . $event->EventTitle . ', Date: ' . $event->EventDate . ', Status: ' . $status)
                ->color('success');
        })->toArray();



        return [
            Stat::make('Users', User::query()->count() . ' ')
                ->description('All users from database')
                ->color('success'),
            ...$eventStats,
        ];
    }
}
