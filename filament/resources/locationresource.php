<?php

namespace Modules\Geo\Filament\Resources;

use Modules\Geo\Filament\Resources\LocationResource\Pages;
use Modules\Geo\Models\Location;
use Cheesegrits\FilamentGoogleMaps\Actions\RadiusAction;
use Cheesegrits\FilamentGoogleMaps\Fields\Geocomplete;
use Cheesegrits\FilamentGoogleMaps\Fields\Map;
use Cheesegrits\FilamentGoogleMaps\Filters\RadiusFilter;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;

//use Modules\Geo\Filament\Resources\LocationResource\RelationManagers;

class LocationResource extends Resource
{
    protected static ?string $model = Location::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->maxLength(256),
                Forms\Components\TextInput::make('lat')
                    ->afterStateUpdated(function ($state, callable $get, callable $set) {
                        $set('location', [
                            'lat' => floatVal($state),
                            'lng' => floatVal($get('lng')),
                        ]);
                    })
                    ->lazy()
                    ->maxLength(32),
                Forms\Components\TextInput::make('lng')
                    ->afterStateUpdated(function ($state, callable $get, callable $set) {
                        $set('location', [
                            'lat' => floatval($get('lat')),
                            'lng' => floatVal($state),
                        ]);
                    })
                    ->lazy()
                    ->maxLength(32),
                Forms\Components\TextInput::make('street')
                    ->maxLength(255),
                Forms\Components\TextInput::make('city')
                    ->maxLength(255),
                Forms\Components\TextInput::make('state')
                    ->maxLength(255),
                Forms\Components\TextInput::make('zip')
                    ->maxLength(255),
                Forms\Components\TextInput::make('formatted_address')
                    ->maxLength(1024),

                //                	            Geocomplete::make('formatted_address')
                //                //                    ->types(['airport'])
                //                //                    ->placeField('name')
                ////                		            ->isLocation()
                ////                		            ->updateLatLng()
                //                		            ->reverseGeocode([
                //                			            'city'   => '%L',
                //                			            'zip'    => '%z',
                //                			            'state'  => '%A1',
                //                			            'street' => '%n %S',
                //                		            ])
                //                		            ->prefix('Choose:')
                //                		            ->placeholder('Start typing an address ...')
                //                		            ->maxLength(1024)
                //                		            ->geolocate(),

                Map::make('location')
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $get, callable $set) {
                        $set('lat', $state['lat']);
                        $set('lng', $state['lng']);
                    })
                    ->drawingControl()
                    ->defaultLocation([39.526610, -107.727261])
                    ->mapControls([
                        'zoomControl' => true,
                    ])
                    ->debug()
                    ->clickable()
//                    ->layers([
//                        'https://googlearchive.github.io/js-v2-samples/ggeoxml/cta.kml',
//                    ])
                    ->autocomplete('formatted_address')
                    ->autocompleteReverse()
                    ->reverseGeocode([
                        'city'   => '%L',
                        'zip'    => '%z',
                        'state'  => '%A1',
                        'street' => '%n %S',
                    ])
                    ->geolocate()
//                    ->reverseGeocodeUsing(function (callable $set, array $results) {
//                        $set('city', 'foo bar');
//                    })
//                    ->placeUpdatedUsing(function (callable $set, array $place) {
//                        $set('city', 'foo wibble');
//                    })
                    ->columnSpan(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                //                Tables\Columns\TextColumn::make('lat'),
                //                Tables\Columns\TextColumn::make('lng'),
                Tables\Columns\TextColumn::make('street'),
                Tables\Columns\TextColumn::make('city')
                    ->searchable(),
                Tables\Columns\TextColumn::make('state')
                    ->searchable(),
                Tables\Columns\TextColumn::make('zip'),
                //                Tables\Columns\TextColumn::make('formatted_address'),
                //                MapColumn::make('location'),
                //                Tables\Columns\TextColumn::make('created_at')
                //                    ->dateTime(),
                //                Tables\Columns\TextColumn::make('updated_at')
                //                    ->dateTime(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('processed'),
                RadiusFilter::make('radius')
                    ->latitude('lat')
                    ->longitude('lng')
                    ->selectUnit()
                    ->section('Radius Search'),
            ]
            )
            ->filtersLayout(FiltersLayout::Dropdown)
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                RadiusAction::make('radius'),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getWidgets(): array
    {
        return [
            //            LocationResource\Widgets\LocationMapWidget::class,
            //            LocationResource\Widgets\LocationMapTableWidget::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListLocations::route('/'),
            'create' => Pages\CreateLocation::route('/create'),
            'view'   => Pages\ViewLocation::route('/{record}'),
            'edit'   => Pages\EditLocation::route('/{record}/edit'),
        ];
    }
}
