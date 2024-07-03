<?php

declare(strict_types=1);

namespace Modules\Geo\Filament\Resources\GeocodeResource\Pages;

use Cheesegrits\FilamentGoogleMaps\Concerns\InteractsWithMaps;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\Geo\Filament\Resources\GeocodeResource;

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
