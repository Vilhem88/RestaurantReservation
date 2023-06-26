<?php

namespace App\Rules;

use Closure;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\ValidationRule;

class TimeBetween implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $pickupDate = Carbon::parse($value);
        $pickupTime = Carbon::createFromTime($pickupDate->hour, $pickupDate->minute, $pickupDate->second);
        // opening hours
        $earliestTime = Carbon::createFromTimeString('08:00:00');
        $latestTime = Carbon::createFromTimeString('23:00:00');
        
        if(!($pickupTime->between($earliestTime, $latestTime)))
        {
            $fail('Invalid Time. Please choose a time between 8:00 - 23:00');
        }
    }
}
