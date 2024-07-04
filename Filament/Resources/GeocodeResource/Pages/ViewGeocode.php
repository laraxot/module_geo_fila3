<?php

namespace Modules\Geo\Filament\Resources\GeocodeResource\Pages;

use Modules\Geo\Filament\Resources\GeocodeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewGeocode extends ViewRecord
{
    protected static string $resource = GeocodeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
