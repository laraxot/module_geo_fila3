<?php

namespace Modules\Geo\Filament\Resources\LocationResource\Pages;

use Modules\Geo\Filament\Resources\LocationResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewLocation extends ViewRecord
{
    protected static string $resource = LocationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
