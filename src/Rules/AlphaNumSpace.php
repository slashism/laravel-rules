<?php

namespace Slashism\LaravelValidationRules\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * Allow only alphabets, numbers and spaces
 */
class AlphaNumSpace implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (preg_match('/^[a-zA-Z0-9\-\s]+$/', $value)) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute can only have alphanumeric and spaces.';
    }
}
