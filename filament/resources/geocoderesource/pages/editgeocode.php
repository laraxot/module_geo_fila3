<?php

namespace Modules\Geo\Filament\Resources\GeocodeResource\Pages;

use Modules\Geo\Filament\Resources\GeocodeResource;
use Cheesegrits\FilamentGoogleMaps\Concerns\InteractsWithMaps;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGeocode extends EditRecord
{
    use InteractsWithMaps;

    protected static string $resource = GeocodeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
