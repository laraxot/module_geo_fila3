<?php

namespace Modules\Geo\Filament\Resources\CustomerResource\Pages;

use Modules\Geo\Filament\Resources\CustomerResource;
use Filament\Pages\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCustomer extends EditRecord
{
    protected static string $resource = CustomerResource::class;

    protected function getActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
