<?php

declare(strict_types=1);

namespace Modules\Geo\Models\Panels;

// --- Services --
use Modules\Cms\Models\Panels\XotBasePanel;
use Modules\Geo\Models\GeoNamesCap;

/**
 * Class GeoNamesCapPanel.
 */
class GeoNamesCapPanel extends XotBasePanel
{
    /**
     * The model the resource corresponds to.
     */
    public static string $model = GeoNamesCap::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     */
    public static string $title = 'title';

    public function fields(): array
    {
        return [
        ];
    }
}
