<?php

namespace Slashism\LaravelValidationRules\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * Check if a string does not starts with a specific value
 */
class StartWithout implements Rule
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
        return !starts_with($value, $this->string);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute should not start with ' . $this->string;
    }
}
