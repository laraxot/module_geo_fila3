<?php

declare(strict_types=1);

namespace Modules\Geo\Filament\Pages;

use Filament\Pages\Page;
use Modules\Xot\Filament\Widgets\EnvWidget;

class SettingPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'ai::filament.pages.setting';

    public function getHeaderWidgets(): array
    {
        $only = [
            'debugbar_enabled',
            'google_maps_api_key',
        ];

        return [
            EnvWidget::make(['only' => $only]),
        ];
    }
}
