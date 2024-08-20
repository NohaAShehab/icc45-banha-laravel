<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidNames implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
        if(in_array(strtolower($value), ['hero', 'manager', 'boss'])) {
            $fail("Invalid name, Name must not be hero or boss or manager");
        }
    }
}
