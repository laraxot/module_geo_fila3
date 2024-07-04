<?php

namespace Modules\Geo\Filament\Resources\GeocodeResource\Pages;

use Modules\Geo\Filament\Resources\GeocodeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateGeocode extends CreateRecord
{
    protected static string $resource = GeocodeResource::class;
}
