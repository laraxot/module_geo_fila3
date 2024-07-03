<?php

declare(strict_types=1);

namespace Modules\Geo\Filament\Resources\GeocodeResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;
use Modules\Geo\Filament\Resources\GeocodeResource;

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
