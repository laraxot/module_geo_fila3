<?php

declare(strict_types=1);

namespace Modules\Geo\Filament\Resources\GeocodeResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\Geo\Filament\Resources\GeocodeResource;

class CreateGeocode extends CreateRecord
{
    protected static string $resource = GeocodeResource::class;
}
