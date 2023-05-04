<?php

namespace App\Rules;

use App\Enum\Currency;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class SprawdzanieWaluty implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!in_array($value, Currency::getAllValues())) {
            $fail('Zły format :attribute');
        }
    }
}
