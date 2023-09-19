<?php

declare(strict_types=1);

namespace Modules\Geo\Models\Panels;

use Modules\Geo\Models\Panels\Actions\TestAction;
use Modules\Cms\Models\Panels\XotBasePanel;

class _ModulePanel extends XotBasePanel
{
    public function actions(): array
    {
        return [
            new TestAction(),
        ];
    }
}
