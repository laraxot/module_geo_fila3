<?php

declare(strict_types=1);

namespace Modules\Geo\Models\Panels;

use Modules\Cms\Models\Panels\XotBasePanel;
use Modules\Geo\Models\Panels\Actions\TestAction;

class _ModulePanel extends XotBasePanel
{
    public function actions(): array
    {
        return [
            new TestAction(),
        ];
    }
}
