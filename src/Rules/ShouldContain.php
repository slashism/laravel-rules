<?php

namespace Slashism\LaravelValidationRules\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * Checks if a particular string exists in the value
 */
class ShouldContain implements Rule
{
    /**
     * @var string
     */
    public $string;

    /**
     * Create a new rule instance.
     *
     * @param null $string
     */
    public function __construct($string = null)
    {
        $this->string = $string;
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
        if (str_contains($value, $this->string)) {
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
        return 'The :attribute should contain ' . $this->string;
    }
}
