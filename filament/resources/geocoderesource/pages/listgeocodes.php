<?php

namespace Modules\Geo\Filament\Resources\GeocodeResource\Pages;

use Modules\Geo\Filament\Resources\GeocodeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGeocodes extends ListRecords
{
    protected static string $resource = GeocodeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
