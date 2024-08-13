<?php

namespace Modules\Geo\Rules;

use Closure;
use Webmozart\Assert\Assert;
use Modules\Ticket\Models\GeoTicket;
use Illuminate\Contracts\Validation\ValidationRule;
use Modules\Geo\Actions\FilterCoordinatesInRadius as CoordinatesFilter;

class FilterCoordinatesInRadius implements ValidationRule
{
    /**
     * Run the validation rule.
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        Assert::isArray($value);
        $coordinatesArray = GeoTicket::select('id','latitude', 'longitude')->get()->toArray();
        $ticket_vicini = app(CoordinatesFilter::class)->execute($value['lat'], $value['lng'], $coordinatesArray, 1);

        if(count($ticket_vicini) > 0){
            $fail("Ci sono già ".(string) count($ticket_vicini)." ticket in questa posizione");
        }
    }
}
