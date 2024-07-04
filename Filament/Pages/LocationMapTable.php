<?php

namespace Modules\Geo\Filament\Pages;

use Modules\Geo\Filament\Widgets;
use Filament\Pages\Page;

class LocationMapTable extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'geo::filament.pages.location-map';

    protected function getHeaderWidgets(): array
    {
        return [
            Widgets\LocationMapTableWidget::class,
            //Widgets\LocationMapWidget::class,
        ];
    }

    public function getHeaderWidgetsColumns(): int|array
    {
        return 1;
    }
}