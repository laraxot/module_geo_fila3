<?php

declare(strict_types=1);

namespace Modules\Geo\Filament\Resources\LocationResource\Pages;

use Cheesegrits\FilamentGoogleMaps\Concerns\InteractsWithMaps;
use Filament\Resources\Pages\CreateRecord;
use Modules\Geo\Filament\Resources\LocationResource;

class CreateLocation extends CreateRecord
{
    use InteractsWithMaps;

    protected static string $resource = LocationResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
