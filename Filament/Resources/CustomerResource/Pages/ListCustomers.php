<?php

declare(strict_types=1);

namespace Modules\Geo\Filament\Resources\CustomerResource\Pages;

use Filament\Pages\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Modules\Geo\Filament\Resources\CustomerResource;

class ListCustomers extends ListRecords
{
    protected static string $resource = CustomerResource::class;

    protected function getActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
