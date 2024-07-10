<?php

declare(strict_types=1);

namespace Modules\Geo\Filament\Resources\SimpleGeocodeResource\Pages;

use Cheesegrits\FilamentGoogleMaps\Concerns\InteractsWithMaps;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;
use Modules\Geo\Filament\Resources\SimpleGeocodeResource;

class ManageSimpleGeocodes extends ManageRecords
{
    use InteractsWithMaps;

    protected static string $resource = SimpleGeocodeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
