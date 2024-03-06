<?php

namespace App\Filament\Resources\MassScheduleResource\Pages;

use App\Filament\Resources\MassScheduleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMassSchedule extends EditRecord
{
    protected static string $resource = MassScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
