<?php

declare(strict_types=1);

namespace Modules\Geo\Filament\Widgets;

use Cheesegrits\FilamentGoogleMaps\Actions\GoToAction;
use Cheesegrits\FilamentGoogleMaps\Actions\RadiusAction;
use Cheesegrits\FilamentGoogleMaps\Filters\MapIsFilter;
use Cheesegrits\FilamentGoogleMaps\Filters\RadiusFilter;
use Cheesegrits\FilamentGoogleMaps\Widgets\MapTableWidget;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Tables;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Modules\Geo\Models\Location;

class LocationMapTableWidget extends MapTableWidget
{
    protected static ?string $heading = 'Location Map';

    protected static ?int $sort = 1;

    protected static ?string $pollingInterval = null;

    protected static ?bool $clustering = true;

    protected static ?bool $fitToBounds = true;

    protected static ?string $mapId = 'incidents';

    protected static ?bool $filtered = true;

    protected static bool $collapsible = true;

    public ?bool $mapIsFilter = false;

    protected static ?string $markerAction = 'markerAction';

    public function getConfig(): array
    {
        $config = parent::getConfig();

        // Disable points of interest
        //        $config['mapConfig']['styles'] = [
        //            [
        //                'featureType' => 'poi',
        //                'elementType' => 'labels',
        //                'stylers' => [
        //                    ['visibility' => 'off'],
        //                ],
        //            ],
        //        ];

        //        $config['zoom'] = 5;
        $config['center'] = [
            'lat' => 34.730369,
            'lng' => -86.586104,
        ];

        return $config;
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\Section::make()->schema([
                TextInput::make('name')
                    ->maxLength(256),
                TextInput::make('lat')
                    ->maxLength(32),
                TextInput::make('lng')
                    ->maxLength(32),
                TextInput::make('street')
                    ->maxLength(255),
                TextInput::make('city')
                    ->maxLength(255),
                TextInput::make('state')
                    ->maxLength(255),
                TextInput::make('zip')
                    ->maxLength(255),
                TextInput::make('formatted_address')
                    ->maxLength(1024),
            ]),
        ];
    }

    protected function getTableQuery(): Builder
    {
        return Location::query()->latest();
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('name')
                ->searchable(),
            TextColumn::make('street')
                ->searchable(),
            TextColumn::make('city')
                ->searchable()
                ->sortable(),
            TextColumn::make('state')
                ->searchable()
                ->sortable(),
            TextColumn::make('zip'),
        ];
    }

    protected function getTableFilters(): array
    {
        return [
            RadiusFilter::make('location')
                ->section('Radius Filter')
                ->selectUnit(),
            MapIsFilter::make('map'),
        ];
    }

    protected function getTableRecordAction(): ?string
    {
        return 'edit';
    }

    protected function getTableHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->form($this->getFormSchema()),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\ViewAction::make()
                ->form($this->getFormSchema()),
            Tables\Actions\EditAction::make()
                ->form($this->getFormSchema()),
            GoToAction::make()
                ->zoom(fn () => 14),
            RadiusAction::make('location'),
        ];
    }

    protected function getTableRecordsPerPageSelectOptions(): array
    {
        return [10, 25, 50, 100];
    }

    protected function getData(): array
    {
        $locations = $this->getRecords();

        $data = [];

        foreach ($locations as $location) {
            $data[] = [
                'location' => [
                    'lat' => $location->lat ? round(floatval($location->lat), static::$precision ?? 18) : 0,
                    'lng' => $location->lng ? round(floatval($location->lng), static::$precision ?? 18) : 0,
                ],
                'label' => $location->formatted_address,
                'id' => $location->id,
                'icon' => [
                    // 'url' => url('images/dealership.svg'),
                    'url' => url('images/fire.svg'),
                    'type' => 'svg',
                    'scale' => [35, 35],
                ],
            ];
        }

        return $data;
    }

    public function markerAction(): Action
    {
        return Action::make('markerAction')
            ->label('Details')
            ->infolist([
                Section::make([
                    TextEntry::make('name'),
                    TextEntry::make('street'),
                    TextEntry::make('city'),
                    TextEntry::make('state'),
                    TextEntry::make('zip'),
                    TextEntry::make('formatted_address'),
                ])
                    ->columns(3),
            ])
            ->record(function (array $arguments) {
                return array_key_exists('model_id', $arguments) ? Location::find($arguments['model_id']) : null;
            })
            ->modalSubmitAction(false);
    }
}
