<?php

namespace Modules\Geo\Filament\Resources\CustomerResource\Pages;

use Modules\Geo\Filament\Resources\CustomerResource;
use Filament\Pages\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

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
