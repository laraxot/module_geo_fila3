<?php

declare(strict_types=1);

namespace Modules\Geo\Rules;

use Illuminate\Contracts\Validation\ValidationRule;
use Modules\Geo\Actions\FilterCoordinatesInRadius as CoordinatesFilter;
use Modules\Ticket\Models\GeoTicket;
use Webmozart\Assert\Assert;

class FilterCoordinatesInRadius implements ValidationRule
{
    /**
     * Run the validation rule.
     */
    public function validate(string $attribute, mixed $value, \Closure $fail): void
    {
        Assert::isArray($value);
        $coordinatesArray = GeoTicket::select('id', 'latitude', 'longitude')->get()->toArray();
        $ticket_vicini = app(CoordinatesFilter::class)->execute($value['lat'], $value['lng'], $coordinatesArray, 1);

        if (count($ticket_vicini) > 0) {
            $fail('Ci sono già '.(string) count($ticket_vicini).' ticket in questa posizione');
        }
    }
}
