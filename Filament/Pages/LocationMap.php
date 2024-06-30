<?php

namespace Modules\Geo\Filament\Pages;

use Modules\Geo\Filament\Widgets\LocationMapTableWidget;
use Modules\Geo\Filament\Widgets\LocationMapWidget;
use Filament\Pages\Page;

class LocationMap extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'geo::filament.pages.location-map';

    protected function getHeaderWidgets(): array
    {
        return [
            //LocationMapTableWidget::class,
            LocationMapWidget::class,
        ];
    }

    public function getHeaderWidgetsColumns(): int|array
    {
        return 1;
    }
}
