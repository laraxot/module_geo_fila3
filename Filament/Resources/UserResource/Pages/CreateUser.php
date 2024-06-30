<?php

namespace Modules\Geo\Filament\Resources\UserResource\Pages;

use Modules\Geo\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;
}
