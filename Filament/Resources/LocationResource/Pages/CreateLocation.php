<?php

namespace Modules\Geo\Filament\Resources\LocationResource\Pages;

use Modules\Geo\Filament\Resources\LocationResource;
use Cheesegrits\FilamentGoogleMaps\Concerns\InteractsWithMaps;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLocation extends CreateRecord
{
    use InteractsWithMaps;

    protected static string $resource = LocationResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
