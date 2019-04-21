<?php

namespace Slashism\LaravelValidationRules\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * Allow only numbers and float values
 */
class FloatNumber implements Rule
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
        if (preg_match('/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/', $value)) {
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
        return 'The :attribute should have a float number.';
    }
}
