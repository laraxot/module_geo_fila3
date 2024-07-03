<?php

namespace Modules\Geo\Filament\Resources\CustomerResource\Pages;

use Modules\Geo\Filament\Resources\CustomerResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCustomer extends CreateRecord
{
    protected static string $resource = CustomerResource::class;
}
